<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>MAMIFS Admin</title>

<style>
body{
  margin:0;
  height:100vh;
  background:radial-gradient(circle at top,#0b1a3d,#02040c);
  font-family:Arial;
  overflow:hidden;
}

/* Lamp cord */
.cord{
  width:3px;
  height:200px;
  background:#444;
  margin:auto;
}

/* Lamp */
.lamp{
  width:80px;
  height:80px;
  background:#222;
  border-radius:50%;
  margin:auto;
  cursor:pointer;
  box-shadow:0 0 0 rgba(255,215,0,0);
  transition:0.4s;
}

/* Light ON */
.lamp.on{
  background:gold;
  box-shadow:0 0 80px rgba(255,215,0,0.9);
}

/* Center */
.center{
  position:absolute;
  top:0;
  left:0;
  right:0;
  display:flex;
  flex-direction:column;
  align-items:center;
}

/* Login modal */
.modal{
  position:fixed;
  inset:0;
  background:rgba(0,0,0,0.7);
  display:none;
  justify-content:center;
  align-items:center;
}

.modal form{
  background:#0e1430;
  padding:30px;
  width:300px;
  border-radius:15px;
  color:white;
}

input,button{
  width:100%;
  padding:12px;
  margin:10px 0;
}

button{
  background:gold;
  border:none;
  font-weight:bold;
  cursor:pointer;
}
</style>
</head>

<body>

<div class="center">
  <div class="cord"></div>
  <div class="lamp" id="lamp"></div>
</div>

<div class="modal" id="loginModal">
  <!-- REAL LOGIN FORM -->
  <form method="POST" action="login.php">
    <h2>Admin Login</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button>Login</button>
  </form>
</div>

<script>
const lamp = document.getElementById("lamp");
const modal = document.getElementById("loginModal");

lamp.onclick = () => {
  lamp.classList.toggle("on");
  modal.style.display = "flex";
};

modal.onclick = (e) => {
  if(e.target === modal){
    modal.style.display = "none";
    lamp.classList.remove("on");
  }
};
</script>

</body>
</html>
