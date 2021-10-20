const lists = document.querySelectorAll('.fullName');

const search = document.getElementById('myInput');


function filterNames(term){
    Array.from(lists)
    // filter an array of todo that we dont want from the list (will remain in the array)
        .filter((todo) => !todo.textContent.toLowerCase().includes(term))
        .forEach((todo) => todo.parentNode.classList.add('filtered'));
    // Do the opposite, unhide table content
    Array.from(lists)
        .filter((todo) => todo.textContent.toLowerCase().includes(term))
        .forEach((todo) => todo.parentNode.classList.remove('filtered'));
}

search.addEventListener('keyup', () => {
    const term = search.value.trim().toLowerCase();
    filterNames(term);
});
