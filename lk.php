<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
  <title>Личный кабинет</title>
  <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=MCua88CT4EdywNl2PajKv6XCb-o8KeOCK9IVfJSQR8YCOobQCDHOodwNI7gcdXSa" charset="UTF-8"></script><style>
    body {
      font-size: 1.3rem;
      background-color: aliceblue;
    }

    span {
      margin-left: 0.5rem;
    }

    p>span:nth-child(1) {
      font-weight: bold;
      color: red;
    }

    p>span:nth-child(2) {
      font-style: italic;
    }

    .edit-btn {
      cursor: pointer;
      color: green;
      font-weight: bolder;
    }

    .edit-btn:hover {
      color: darkgreen;
    }

    .save-btn {
      cursor: pointer;
      color: red;
      font-weight: bolder;
    }

    .save-btn:hover {
      color: darkred;
    }

    .cancel-btn {
      cursor: pointer;
      color: blue;
      font-weight: bolder;
    }

    .cancel-btn:hover {
      color: darkblue;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <h1 class="text-center my-5">Страница личного кабинета</h1>

    <p><span>Id:</span>
      <span></span>
    </p>
    <p><span>Email:</span>
      <span></span>
    </p>
    <p>
      <span>Имя:</span>
      <span></span>
      <span class="edit-btn">[ Изменить ]</span>
      <span class="save-btn" hidden data-item="name">[ Сохранить ]</span>
      <span class="cancel-btn" hidden>[ Отменить ]</span>
    </p>
    <p>
      <span>Фамилия:</span>
      <span></span>
      <span class="edit-btn">[ Изменить ]</span>
      <span class="save-btn" hidden data-item="lastname">[ Сохранить ]</span>
      <span class="cancel-btn" hidden>[ Отменить ]</span>
    </p>

  </div>

  <script>
    let edit_buttons = document.querySelectorAll(".edit-btn");
    let save_buttons = document.querySelectorAll(".save-btn");
    let cancel_buttons = document.querySelectorAll(".cancel-btn");


    for (let i = 0; i < edit_buttons.length; i++) {

      let inputValue = edit_buttons[i].previousElementSibling.innerText;

      edit_buttons[i].addEventListener("click", () => {
        edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" value="${inputValue}">`
        edit_buttons[i].hidden = true;
        save_buttons[i].hidden = false;
        cancel_buttons[i].hidden = false;
      })

      cancel_buttons[i].addEventListener("click", () => {
        edit_buttons[i].previousElementSibling.innerText = inputValue;
        edit_buttons[i].hidden = false;
        save_buttons[i].hidden = true;
        cancel_buttons[i].hidden = true;
      })

      save_buttons[i].addEventListener("click", async () => {


        let newInputValue = edit_buttons[i].previousElementSibling.firstElementChild.value;
        edit_buttons[i].previousElementSibling.innerText = newInputValue;
        edit_buttons[i].hidden = false;
        save_buttons[i].hidden = true;
        cancel_buttons[i].hidden = true;

        let formData = new FormData();
        formData.append("item", save_buttons[i].dataset.item);
        formData.append("value", newInputValue);

        let response = await fetch("php/lk_obr.php", {
          method: "POST",
          body: formData
        })


      })

    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>
