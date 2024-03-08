window.addEventListener('load', function (evt) {

    // Q2
    const my_link = this.document.querySelector('#my_link');
    my_link.addEventListener('click', function (evt) {
        evt.preventDefault();
        console.log(this.getAttribute('href'));

    })

    // Q3
    const c = this.document.querySelector('#c'),
        f = this.document.querySelector('#f');

    const c2f = c => {
        return c * 1.8 + 32;
    }
    const f2c = f => {
        return (f - 32) / 1.8;
    }

    c.addEventListener('keyup', function (evt) {
        const val_c = c.value.trim();
        f.value = c2f(parseFloat(val_c)).toFixed(3);
    })
    f.addEventListener('keyup', function (evt) {
        const val_f = f.value.trim();
        c.value = f2c(parseFloat(val_f)).toFixed(3);
    })

    // Q4

    const my_form = this.document.querySelector('#my_form'),
        my_section = this.document.querySelector('#my_section');

    my_form.addEventListener('submit', function (evt) {
        evt.preventDefault();
        let fields_ok = true;

        const my_text = document.querySelector('#my_text').value.trim(),
            my_pwd = document.querySelector('#my_pwd').value.trim(),
            my_textarea = document.querySelector('#my_textarea').value.trim();

        if (my_text.length === 0) { fields_ok = false; }
        if (my_pwd.length === 0) { fields_ok = false; }
        if (my_textarea.length === 0) { fields_ok = false; }

        const checkboxes = document.querySelectorAll('input[type=checkbox]'),
            radios = document.querySelectorAll('input[type=radio]');
        let checkbox_ok = false,
            radio_ok = false;
        var radio_selected;

        for (let checkbox of checkboxes) {
            if (checkbox.checked) {
                checkbox_ok = true;
                break;
            }
        }
        for (let radio of radios) {
            if (radio.checked) {
                radio_selected = radio.value;
                radio_ok = true;
                break;
            }
        }

        fields_ok = fields_ok && checkbox_ok && radio_ok;

        if (fields_ok === false) {
            my_section.textContent = 'please fill in all blank fields';
        }
        else {
            my_section.textContent = '';

            const p1 = document.createElement('p');
            p1.textContent = `Text: ${my_text}`;

            const p2 = document.createElement('p');
            p2.textContent = `Password: ${my_pwd}`;

            let i, checkbox_selected = [];
            for (i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checkbox_selected.push(checkboxes[i].value);
                }
            }

            const p3 = document.createElement('p');
            p3.textContent = `Checkbox values: ${checkbox_selected}`;

            const p4 = document.createElement('p');
            p4.textContent = `Radio value: ${radio_selected}`;

            const my_select = document.querySelector('#my_select');
            const p5 = document.createElement('p');
            p5.textContent = `Selected option: ${my_select.options[my_select.selectedIndex].value}`;

            const p6 = document.createElement('p');
            p6.textContent = `Textarea: ${my_textarea}`;

            my_section.appendChild(p1);
            my_section.appendChild(p2);
            my_section.appendChild(p3);
            my_section.appendChild(p4);
            my_section.appendChild(p5);
            my_section.appendChild(p6);
        }


    })



})