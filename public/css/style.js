import './style.css';

const table = document.getElementById('table');
function search(val) {
  console.log(val, 'asjfoei');
  fetch('https://jsonplaceholder.typicode.com/todos')
    .then((e) => e.json())
    .then((e) => updatetable(e));
}

function updatetable(list) 
{
  list.map((e) => console.log(e.title));
  table.innerHTML = '';
  list.forEach((e, i) => {
    setTimeout(() => {
      const tr = document.createElement('tr');
      tr.innerHTML += `<td>${e.id}</td><td>${e.title}</td>`;
      table.appendChild(tr);
    }, 500 * i);
  });
}

document.getElementById('srch-btn').addEventListener('click', function () {
  const val = document.getElementById('author_name');
  search(val);
});
