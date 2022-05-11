
if (!navigator.connection.type === 'none') {
  console.log('YOU ARE OUT OF INTERNET!!');

  tinymce.init({
    selector: "#post-body",
    plugins: [
      "a11ychecker",
      "advlist",
      "advcode",
      "advtable",
      "autolink",
      "checklist",
      "export",
      "lists",
      "link",
      "image",
      "charmap",
      "preview",
      "anchor",
      "searchreplace",
      "visualblocks",
      "powerpaste",
      "fullscreen",
      "formatpainter",
      "insertdatetime",
      "media",
      "table",
      "help",
      "wordcount",
    ],
    toolbar:
      "undo redo | formatpainter casechange blocks | bold italic backcolor | " +
      "alignleft aligncenter alignright alignjustify | " +
      "bullist numlist checklist outdent indent | removeformat | a11ycheck code table help",
  });

}

// post show functionallity
const postShowButtons = document.querySelectorAll('.post_show_button');
const showPostDrawer = document.querySelector('.post_show_drawer');
const showPostDrawerCloseButton = showPostDrawer.querySelector('button');

postShowButtons.forEach(function (postShowButton) {
  postShowButton.addEventListener('click', function () {
    showPostDrawer.classList.add('show');

    const postId = (postShowButton.dataset.postid);

    // fetch post with this post id
    fetch('/api/posts/' + postId)
      .then(res => res.json())
      .then(data => {
        const { title, body } = (data);
        showPostDrawer.querySelector('h2').innerText = title;
        showPostDrawer.querySelector('div').innerHTML = body;
      })

  })
})

showPostDrawerCloseButton.addEventListener('click', function () {
  showPostDrawer.classList.remove('show');
})