// wait for the entire page to load
window.addEventListener("load", (event) => {
    window.addItem = function () {
            const todoList = document.getElementById("itemList");
            
            console.log("Adding item to todo list");
            const element = createElementFromHTML(cardHTML(document.getElementById("todoText").value));
            
            todoList.appendChild(element);
        }
    });

    const cardHTML = (todoText) => `<div class="col-md-6 col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            ${todoText}
                        </p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" onclick="removeItem();">
                            Delete
                        </button>
                    </div>
                </div>
            </div>`;

    function createElementFromHTML(htmlString){
        const template = document.createElement("template");
        template.innerHTML = htmlString.trim();
        return template.content.firstChild;
    }