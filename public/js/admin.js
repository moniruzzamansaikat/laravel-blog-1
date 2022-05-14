if (!navigator.connection.type === "none") {
    console.log("YOU ARE OUT OF INTERNET!!");

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

const postShowButtons = document.querySelectorAll(".post_show_button");
const showPostDrawer = document.querySelector(".post_show_drawer");
const showPostDrawerCloseButton = showPostDrawer?.querySelector("button");
const alerts = document.querySelectorAll(".alert");

postShowButtons.forEach(function (postShowButton) {
    postShowButton.addEventListener("click", function () {
        showPostDrawer.classList.add("show");

        const postId = postShowButton.dataset.postid;

        // fetch post with this post id
        fetch("/api/posts/" + postId)
            .then((res) => res.json())
            .then((data) => {
                const { title, body } = data;

                showPostDrawer.querySelector("h2").innerText = title;
                showPostDrawer.querySelector("div.info").innerHTML = `
          <p class="text-secondary">${data.author.name} | <span>${
                    data.category || "Uncategorized"
                }</span></p>         
        `;
                showPostDrawer.querySelector("div.content").innerHTML = body;
            });
    });
});

showPostDrawerCloseButton?.addEventListener("click", function () {
    showPostDrawer.classList.remove("show");
});

// remove alerts after 2 seconds
setTimeout(function () {
    alerts.forEach(function (alert) {
        alert.remove();
    });
}, 2000);

document.querySelectorAll("a.confirm_link").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        const url = link.getAttribute("href");
        const message = link.getAttribute("data-message");
        if (confirm(message)) {
            window.location.href = url;
        }
    });
});
