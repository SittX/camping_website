<?php
class SessionManager
{
    public static function checkAdmin(): bool
    {
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
            if (isset($_SESSION["user"]["rank"]) && $_SESSION["user"]["rank"] === "admin") {
                return true;
            }
        }
        return false;
    }
    public static function checkIfUserLoggedIn(): bool
    {
        return isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];
    }

    public static function login(User $user): void
    {
        $_SESSION["user"] = ["username" => $user->getUsername(), "rank" => $user->getRank(), "id" => $user->getUserId()];
        $_SESSION["logged_in"] = true;
        header("Location: ../pages/home.php");
    }
    public static function logout(): void
    {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 3600, "/");
    }
}
