window.addEventListener('load', function(evt) {
    // get all gallery links
    const links = this.document.querySelectorAll('#images a');

    // wire up links
    for (const link of links) {
        link.addEventListener('click', showImage);

    }

    function showImage(evt) {
        evt.preventDefault();

        const img = this.getAttribute('href');
        const txt = this.getAttribute('title');

        const placeholder = document.querySelector('#placeholder');
        placeholder.setAttribute('src', img);
        placeholder.setAttribute('alt', txt);

        document.querySelector('#description').textContent = txt;
    }



    
})