      function toggleContent(id) {
          var content = document.getElementById(id + 'Content');
          var plusMinus = document.querySelector('#' + id + ' span');

          if (content.classList.contains('hidden')) {
              content.classList.remove('hidden');
              plusMinus.textContent = '-';
          } else {
              content.classList.add('hidden');
              plusMinus.textContent = '+';
          }
      }

    function submitForm(id) {
        document.getElementById("wishlistForm" + id).submit();
    }


      function toggleContent(id) {
          var content = document.getElementById(id + 'Content');
          var plusMinus = document.querySelector('#' + id + ' span');

          if (content.classList.contains('hidden')) {
              content.classList.remove('hidden');
              plusMinus.textContent = '-';
          } else {
              content.classList.add('hidden');
              plusMinus.textContent = '+';
          }
      }


        function submitForm(id) {
            document.getElementById("wishlistForm" + id).submit();
        }


        document.addEventListener("DOMContentLoaded", function() {
            const checkbox = document.getElementById("flowbite-option");
            const fileInput = document.getElementById("file");
            const submitButton = document.getElementById("submitButton");

            checkbox.addEventListener("change", function() {
                if (checkbox.checked) {
                    fileInput.style.display = "block";
                    submitButton.style.display = "block";
                } else {
                    fileInput.style.display = "none";
                    submitButton.style.display = "none";
                }
            });

            if (checkbox.checked) {
                fileInput.style.display = "block";
                submitButton.style.display = "block";
            } else {
                fileInput.style.display = "none";
                submitButton.style.display = "none";
            }
        });



        document.addEventListener("DOMContentLoaded", function() {
            const checkbox = document.getElementById("flowbite-option");
            const fileInput = document.getElementById("file");
            const submitButton = document.getElementById("submitButton");

            checkbox.addEventListener("change", function() {
                if (checkbox.checked) {
                    fileInput.style.display = "block";
                    submitButton.style.display = "block";
                } else {
                    fileInput.style.display = "none";
                    submitButton.style.display = "none";
                }
            });

            // Au chargement de la page, vérifie l'état initial de la case à cocher
            if (checkbox.checked) {
                fileInput.style.display = "block";
                submitButton.style.display = "block";
            } else {
                fileInput.style.display = "none";
                submitButton.style.display = "none";
            }
        });


    window.onload = () => {
        const stars = document.querySelectorAll(".la-star");

        const note = document.querySelector("#note");

        for (star of stars) {
            star.addEventListener("mouseover", function() {
                resetStars();
                this.style.color = "red";
                this.classList.add("las");
                this.classList.remove("lar");
                let previousStar = this.previousElementSibling;

                while (previousStar) {
                    previousStar.style.color = "red";
                    previousStar.classList.add("las");
                    previousStar.classList.remove("lar");
                    previousStar = previousStar.previousElementSibling;
                }
            });

            star.addEventListener("click", function() {
                note.value = this.dataset.value;
            });

            star.addEventListener("mouseout", function() {
                resetStars(note.value);
            });
        }

        /**
         * Reset des étoiles en vérifiant la note dans l'input caché
         * @param {number} note
         */
        function resetStars(note = 0) {
            for (star of stars) {
                if (star.dataset.value > note) {
                    star.style.color = "black";
                    star.classList.add("lar");
                    star.classList.remove("las");
                } else {
                    star.style.color = "red";
                    star.classList.add("las");
                    star.classList.remove("lar");
                }
            }
        }
    }
