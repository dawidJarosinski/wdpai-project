const search = document.querySelector('input[placeholder="Szukaj wpisów..."]');
const postContainer = document.querySelector(".categories");

search.addEventListener("keyup", function(event) {
    if(event.key === "Enter") {
        event.preventDefault();

        const data = { search: this.value };

        fetch("/search", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        }).then(function(response) {
            return response.json();
        }).then(function(posts) {
            postContainer.innerHTML = "";
            loadPosts(posts);
        });
    }
});

function loadPosts(posts) {
    posts.forEach(function(post) {
        createPost(post);
    });
}

function createPost(post) {
    const template = document.querySelector("#post-template");
    const clone = template.content.cloneNode(true);

    const a = clone.querySelector("a");
    a.href = `/post?id=${post.id}`;

    const title = clone.querySelector("h2");
    title.innerHTML = post.title;

    const content = clone.querySelector("p");
    content.innerHTML = post.content;

    const small = clone.querySelector("small");
    small.innerHTML = `Napisany przez: ${post.name} ${post.surname}, dnia: ${post.created_at}`;

    postContainer.appendChild(clone);
}
