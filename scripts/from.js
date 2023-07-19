window.onload = () => {

    fetch("db/country.json")
        .then(response => response.json())
        .then(data => showData(data));


    function showData(data) {
        const ulFrag = document.createDocumentFragment();
        for (const key in data.countrys) {
            const op = document.createElement('option');
            sHtml = `<option value="${data.countrys[key].country}">${data.countrys[key].country}</option>`;
            op.innerHTML = sHtml;
            ulFrag.appendChild(op);
        }

        document.getElementById("safeCountry").appendChild(ulFrag);
    }

};