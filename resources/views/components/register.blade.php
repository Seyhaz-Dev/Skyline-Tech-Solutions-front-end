<?php


$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // check if email already exists
    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {
        $message = "Email already exists!";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([$name, $email, $password])) {
            $message = "Register successful! You can login now.";
        } else {
            $message = "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jinlong Property - Register</title>
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

    <h2 class="text-center text-2xl font-light tracking-wider mb-6">
        CREATE ACCOUNT
    </h2>

    <?php if ($message): ?>
        <p class="bg-green-500 p-2 rounded mb-4 text-center">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>

    <form method="POST" class="space-y-4">

        <input type="text" name="name" placeholder="Full Name"
            class="w-full bg-transparent border-b order-white/50 focus:outline-none py-2 placeholder-white"
            required>

        <input type="email" name="email" placeholder="Email"
            class="w-full bg-transparent border-b border-white/50 focus:outline-none py-2 placeholder-white"
            required>

        <input type="password" name="password" placeholder="Password"
            class="w-full bg-transparent border-b border-white/50 focus:outline-none py-2 placeholder-white"
            required>

        <button type="submit"
            class="w-full bg-blue-900 hover:bg-blue-700 py-2 rounded-lg mt-4 transition">
            REGISTER
        </button>

    </form>

    <p class="text-center mt-4 text-sm">
        Already have an account?
        <a href="login" class="underline">Login</a>
    </p>

</div>

</body>
</html>