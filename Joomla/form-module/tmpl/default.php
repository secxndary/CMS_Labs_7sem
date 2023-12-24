<?php
defined('_JEXEC') or die;
?>

<style>
    #toggle-form {
        background-color: #3a3c72;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    #contact-form {
        display: block;
    }
    
    #contact-form.form-collapsed {
        display: none;
    }

</style>

<div>
    <button id="toggle-form">Открыть/закрыть форму</button>
    <div id="contact-form" class="form-collapsed">
        <form id="contactForm">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" required /> <br />

            <label for="subject">Тема</label>
            <input type="text" id="subject" name="subject" required /> <br />

            <label for="message">Текст обращения</label>
            <textarea id="message" name="message" required></textarea>

			<label for="subject">Капча</label>
            <div>1 + 1 = </div>
			<input type="text" id="kaptcha" name="kaptcha" required /> <br />

            <button type="submit">Отправить</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var formContainer = document.getElementById(
            "contact-form-container"
        );
        var toggleButton = document.getElementById("toggle-form");
        var contactForm = document.getElementById("contact-form");

        toggleButton.addEventListener("click", function () {
            contactForm.classList.toggle("form-collapsed");
        });
    });
</script>