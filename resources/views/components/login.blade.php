<?php
session_start();


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user["name"];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jinlong Property - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-400 to-blue-800 min-h-screen flex items-center justify-center">

<div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-xl w-96 text-white">
    
    <!-- Website Name -->
    <h1 class="text-center text-xl font-semibold mb-2 tracking-wide">
        Jinlong Property
    </h1>

    <div class="flex justify-center mb-4">
        <div class="bg-blue-900 p-4 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
    </div>

    <h2 class="text-center text-2xl font-light tracking-widest mb-6">
        CUSTOMER LOGIN
    </h2>

    <?php if ($error): ?>
        <p class="bg-red-500 p-2 rounded mb-4 text-center">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>

    <form method="POST" class="space-y-4">

        <input type="email" name="email" placeholder="Email ID"
            class="w-full bg-transparent border-b border-white/50 focus:outline-none py-2 placeholder-white"
            required>

        <input type="password" name="password" placeholder="Password"
            class="w-full bg-transparent border-b border-white/50 focus:outline-none py-2 placeholder-white"
            required>

        <div class="flex justify-between text-sm text-white/80">
            <label class="flex items-center gap-1">
                <input type="checkbox"> Remember me
            </label>
            <a href="#" class="hover:underline">Forgot Password?</a>
        </div>

        <button type="submit"
            class="w-full bg-blue-900 hover:bg-blue-700 py-2 rounded-lg mt-4 transition">
            LOGIN
        </button>

    </form>

    <p class="text-center mt-4 text-sm">
        Don't have an account?
        <a href="register.php" class="underline">Register</a>
    </p>

</div>

</body>
</html>