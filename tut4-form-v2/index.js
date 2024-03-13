window.addEventListener('load', function (evt) {
    const email = this.document.querySelector('#email'),
        subject = this.document.querySelector('#subject'),
        message = this.document.querySelector('#message'),

        loading = this.document.querySelector('#loading'),
        success = this.document.querySelector('#success'),
        error = this.document.querySelector('#error'),
        my_form = this.document.querySelector('form');

    this.document.querySelector('#reset_success').addEventListener('click', reset);
    this.document.querySelector('#reset_error').addEventListener('click', reset);

    function reset(evt) {
        evt.preventDefault();

        if (this.getAttribute('id') === 'reset_success') {
            email.value = '';
            subject.value = '';
            message.value = '';
        }

        success.style.display = 'none';
        error.style.display = 'none';
        my_form.style.display = 'block';
    }

    my_form.addEventListener('submit', function (evt) {
        evt.preventDefault();
        const val_email = email.value.trim(),
            val_subject = subject.value.trim(),
            val_message = message.value.trim();

        document.querySelector('#hint_email').style.display = 'none';
        document.querySelector('#hint_subject').style.display = 'none';
        document.querySelector('#hint_message').style.display = 'none';

        let fields_ok = true;
        if (val_email.length === 0 || val_email.indexOf('@') < 0) {
            document.querySelector('#hint_email').style.display = 'inline';
            fields_ok = false;
        }

        if (val_subject.length === 0) {
            document.querySelector('#hint_subject').style.display = 'inline';
            fields_ok = false;
        }

        if (val_message.length === 0) {
            document.querySelector('#hint_message').style.display = 'inline';
            fields_ok = false;
        }


        if (fields_ok) {
            loading.style.display = 'block';
            my_form.style.display = 'none';


            const formData = new FormData();
            formData.append('email', encodeURIComponent(val_email));
            formData.append('subject', encodeURIComponent(val_subject));
            formData.append('message', encodeURIComponent(val_message));


            const request = new Request('https://mw159.brighton.domains/ci527/contact.php', {
                method: 'POST',
                body: formData,

            });

            async function postData(request) {
                try {
                    const response = await fetch(request);
                    if (response.status === 201) {
                        loading.style.display = 'none';
                        success.style.display = 'block';

                    }

                }
                catch (err) {
                    console.log('fetch error', err);
                    loading.style.display = 'none';
                    error.style.display = 'block';
                }
            }

            postData(request);

        }

    });


})