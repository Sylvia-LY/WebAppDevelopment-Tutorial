// https://mw159.brighton.domains/demo/contactform_dummy/
window.addEventListener('load', function (evt) {

    const email = this.document.querySelector('#email'),
        subject = this.document.querySelector('#subject'),
        message = this.document.querySelector('#message')
        
        success = this.document.querySelector('#success'),
        error = this.document.querySelector('#error'),
        loading = this.document.querySelector('#loading'),
        contact = this.document.querySelector('#contact');


    // wire up event listeners
    this.document.querySelector('#contact form').addEventListener('submit', sendMessage);
    this.document.querySelector('#reset_success').addEventListener('click', reset);
    this.document.querySelector('#reset_error').addEventListener('click', reset);

    function reset(evt) {
        evt.preventDefault();

        if (this.getAttribute('id') == 'reset_success') {
            email.value = '';
            subject.value = '';
            message.value = '';
        }

        success.style.display = 'none';
        error.style.display = 'none';
        loading.style.display = 'none';
        contact.style.display = 'block';

    }

    async function sendMessage(evt) {
        evt.preventDefault();

        // get values
        const val_email = email.value.trim(),
            val_subject = subject.value.trim(),
            val_message = message.value.trim();

        // check all the input values
        let fields_ok = true;
        if (val_email.length == 0 || val_email.indexOf('@') < 0) {
            document.querySelector('#hint_email').style.display = 'inline';
            fields_ok = false;
        }
        else {
            document.querySelector('#hint_email').style.display = 'none';
        }

        if (val_subject.length == 0) {
            document.querySelector('#hint_subject').style.display = 'inline';
            fields_ok = false;
        }
        else {
            document.querySelector('#hint_subject').style.display = 'none';
        }

        if (val_message.length == 0) {
            document.querySelector('#hint_message').style.display = 'inline';
            fields_ok = false;
        }
        else {
            document.querySelector('#hint_message').style.display = 'none';
        }



        if (fields_ok) {
            // hide the form & show loading icon
            contact.style.display = 'none';
            loading.style.display = 'block';

            // prepare data for transport to server
            const data = new FormData();
            data.append('email', val_email);
            data.append('subject', val_subject);
            data.append('message', val_message);

            await new Promise((resolve, reject) => {
                setTimeout(resolve, 2000);
            })

            const flag_success = Math.random() > 0.5;
            loading.style.display = 'none';
            if (flag_success) {
                success.style.display = 'block';
            }
            else {
                error.style.display = 'block';
            }

        }

    }


})



