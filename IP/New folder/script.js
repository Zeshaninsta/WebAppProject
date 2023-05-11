function validate() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
  
    if (username.value.trim() === "" && password.value.trim() === "") {
      username.classList.add("invalid");
      password.classList.add("invalid");
      setTimeout(function() {
        username.classList.remove("invalid");
        password.classList.remove("invalid");
      }, 500);
    } else {
      var overlay = document.createElement("div");
      overlay.classList.add("overlay");
      document.body.appendChild(overlay);
  
      var loader = document.createElement("div");
      loader.classList.add("loader");
      overlay.appendChild(loader);
  
      setTimeout(function() {
        overlay.classList.add("active");
        setTimeout(function() {
          overlay.classList.remove("active");
          document.body.removeChild(overlay);
  
          // Redirect to dashboard or homepage
          // window.location.href = "dashboard.html";
        }, 2000);
      }, 1000);
    }
  }