function loaddata(){
fetch("https://jsonplaceholder.typicode.com/users")
      .then(resp => resp.json())
      .then(data => showdata(data));

}

function showdata(data){
      console.log(data);
      data.map(user => {
            let div = document.createElement("div");
            div.className = "user";
            div.innerHTML = `<h2>${user.name}</h2>
                             <p>Email: ${user.email}</p>
                             <p>Phone: ${user.phone}</p>`;
            document.getElementById("divtag").appendChild(div);
      }

      );    
}