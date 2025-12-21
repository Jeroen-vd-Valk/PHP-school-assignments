function getPublishedDate(article){
  const publishedDate = new Date(article.published).toLocaleDateString(
    "en-US",
    {
      year: "numeric",
      month: "numeric",
      day: "numeric",
    }
  )
  return publishedDate;
};

function loadAndDisplayArticles() {
  // Assignment 2 - display articles
  // fetch articles from the API and display them inside the `<div id="articles-container"></div>` element
  fetch('/api/articles')
  .then(res => res.json())
  .then((articles) => {
    console.log(articles);
    const articlesContainer = document.getElementById("articles-container");
    articlesContainer.innerHTML = '';

    articles.forEach(article => {
      const articleDiv = document.createElement("div");
      articleDiv.innerHTML = `
      <div class="card mb-4 shadow-sm"
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <h5 class="card-title mb-0">${article.title}</h5>
            <span class="badge bg-primary">${article.category}</span>
          </div>
          <div class="text-muted small mb-3">
            <span class="me-3">By ${article.author}</span>
            <span>Published: ${getPublishedDate(article)}</span>
          </div>
          <p class="card-text">${article.content}</p>
          <div class="d-flex gap-2">
            <a href="article/${article.id}" class="btn btn-outline-primary btn-sm">Read More</a>
            <button class="btn btn-outline-danger btn-sm" onclick="deleteArticle(${article.id})">Delete</button>
          </div>
        </div>
      </div>
      `;

      articlesContainer.appendChild(articleDiv);
    });        
  }).catch(err => console.error(err));
}

function setupArticleForm() {
  // Assignment 3 - create an article
  // get reference to article form and set up event listener
  // on submit, prevent default behavior, get form data, JSON encode it, and send POST request to API
  const form = document.getElementById("article-form");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    const articleData = {
      title: formData.get('title'),
      author: formData.get('author'),
      category: formData.get('category'),
      published: formData.get('published'),
      content: formData.get('content'),
    }
    /*
    const articleData = {
      title: document.getElementById("title").value.trim(),
      author: document.getElementById("author").value,
      category: document.getElementById("category").value,
      published: document.getElementById("published").value,
      content: document.getElementById("content").value,
    }
      */
    try{
    await fetch('/api/addArticle', {
      method: 'POST',
      headers: {'Content-Type': 'application/json', },
      body: JSON.stringify(articleData),
    })
    .then(() => {
      loadAndDisplayArticles();
      form.reset();
    });
  } catch(error){
    console.error('Weeee', error);
  };
  });
}

window.addEventListener("DOMContentLoaded", () => {
  loadAndDisplayArticles();
  setupArticleForm();
});