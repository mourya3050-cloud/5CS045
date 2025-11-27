<?php
// index.php
include("db.php");
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Game Portal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- LOGIN FORM -->
<div id="login-container" class="container mt-5" style="display:none;">
    <h2>Login</h2>
    <form id="loginForm">
        <input type="text" id="username" placeholder="Username" class="form-control mb-2" required>
        <input type="password" id="password" placeholder="Password" class="form-control mb-2" required>
        <div id="login-error" class="text-danger mb-2"></div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<!-- GAME PORTAL -->
<div id="portal-container" class="container mt-5" style="display:none;">
    <h1>Welcome to Game Portal</h1>

    <h3>Latest Games</h3>
    <div class="row mt-3">
        <?php
        $sql = "SELECT * FROM videogames ORDER BY released_date DESC";
        $result = $mysqli->query($sql);
        if($result && $result->num_rows > 0):
            while($game = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5><?= htmlspecialchars($game['game_name']) ?></h5>
                            <p><?= substr(htmlspecialchars($game['game_description']),0,100) ?>...</p>
                        </div>
                        <div class="card-footer">
                            Rating: <?= $game['rating'] ?>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        else: ?>
            <p>No games added yet.</p>
        <?php endif; ?>
    </div>

    <button id="logoutBtn" class="btn btn-danger mt-4">Logout</button>
</div>

<script>
// Hardcoded credentials
const USERNAME = 'admin';
const PASSWORD = '1234';

function showLogin(){ document.getElementById('login-container').style.display = 'block'; document.getElementById('portal-container').style.display = 'none'; }
function showPortal(){ document.getElementById('login-container').style.display = 'none'; document.getElementById('portal-container').style.display = 'block'; }

// Check if logged in this tab
if(sessionStorage.getItem('loggedIn') === 'true'){ showPortal(); } else { showLogin(); }

// Login form handler
document.getElementById('loginForm').addEventListener('submit', function(e){
    e.preventDefault();
    let user = document.getElementById('username').value;
    let pass = document.getElementById('password').value;
    let errorDiv = document.getElementById('login-error');

    if(user === USERNAME && pass === PASSWORD){
        sessionStorage.setItem('loggedIn','true');
        showPortal();
        errorDiv.textContent='';
    } else {
        errorDiv.textContent='Invalid username or password';
    }
});

// Logout button
document.getElementById('logoutBtn').addEventListener('click', function(){
    sessionStorage.removeItem('loggedIn');
    showLogin();
});
</script>

</body>
</html>
