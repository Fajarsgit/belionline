const baseUrl = "https://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=e5e6c0d699324749947ae29b6e88999a";
const apiKey = "e5e6c0d699324749947ae29b6e88999a";
const contents = document.querySelector("#news");

function getNews() {
    fetch(baseUrl)
     .then(response => response.json())
     .then(resJson => {
        console.log(resJson.articles);
        let results = "";
        resJson.articles.forEach(result=>{
            results += `
            <div class="col-md-3 mb-3 mt-5">
            <div class="shadow mb-5">
                  <img src="${result.urlToImage}" class="card-img-top" alt="...">
                  <div class="card-body shadow rounded" style="background-color: #ffff;" >
                    <h5 class="card-title"><strong>${result.title}</strong></h5>
                        <p class="card-text">${result.description}</p>
                        <a href="${result.url}" class="btn btn-info shadow rounded-pill">Read</a>
                    <p class="card-text"><small class="text-muted">Updated ${result.publishedAt}</small></p>
                  </div>
                </div>
                </div>
                
            `
        });
        contents.innerHTML = '<div data-aos="fade-down" class="card-deck">' + results + '</div>'
     })
}

document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('#news');
            
            getNews();
});