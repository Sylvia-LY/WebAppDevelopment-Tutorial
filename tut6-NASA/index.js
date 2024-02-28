window.addEventListener('load', function (evt) {


    const btn = this.document.querySelector('button');
    btn.addEventListener('click', function (evt) {
    
        const results = document.querySelector('#results');

        while (results.lastChild) {
            results.removeChild(results.lastChild);
        }

        var search = 'Apollo 11';

        // construct url
        const url = `https://images-api.nasa.gov/search?q=${encodeURIComponent(search)}&media_type=image`;

        var xhr = new XMLHttpRequest();

        xhr.addEventListener('load', function () {
            if (xhr.status == 200) {
                const data = JSON.parse(xhr.responseText);

                for (item of data.collection.items) {

                    const card = document.createElement('div');

                    const title = document.createElement('p');
                    title.textContent = item.data[0].title;

                    const img = document.createElement('img');
                    img.setAttribute('src', item.links[0].href);
                    img.setAttribute('alt', item.data[0].description);

                    card.appendChild(title);
                    card.appendChild(img);

                    results.appendChild(card);

                }

            }
            else {
                console.log(`status code: ${xhr.status}`);

            }

        })

        xhr.open('GET', url, true);
        xhr.send();


    })

})