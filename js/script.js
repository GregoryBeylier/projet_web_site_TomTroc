document.addEventListener("DOMContentLoaded", function () {
  // Profil
  var modifier = document.getElementById("modifier");
  var profilePicture = document.getElementById("profile_picture");

  if (modifier && profilePicture) {
    modifier.addEventListener("click", function (e) {
      e.preventDefault();
      profilePicture.click();
    });

    profilePicture.addEventListener("change", function () {
      this.form.submit();
    });
  }

  // Edit livre
  var modifierPhoto = document.getElementById("modifier_photo");
  var editPicture = document.getElementById("edit_picture");

  if (modifierPhoto && editPicture) {
    modifierPhoto.addEventListener("click", function (e) {
      e.preventDefault();
      editPicture.click();
    });

    editPicture.addEventListener("change", function () {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.querySelector(".edit_book_left img").src = e.target.result;
      };
      reader.readAsDataURL(this.files[0]);
    });
  }

  // Ajouter un livre - prévisualisation photo
  var picture = document.getElementById("picture");
  var previewPicture = document.getElementById("preview_picture");

  if (picture && previewPicture) {
    picture.addEventListener("change", function () {
      var reader = new FileReader();
      reader.onload = function (e) {
        previewPicture.src = e.target.result;
      };
      reader.readAsDataURL(this.files[0]);
    });
  }

  // Scroll messagerie
  const messages = document.querySelector(".thread_messages");
  if (messages) {
    setTimeout(() => {
      messages.scrollTop = messages.scrollHeight;
    }, 100);
  }
});