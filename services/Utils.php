<?php

class Utils
{
    /**
     * Redirige vers une URL.
     *
     * @param string $action : l'action que l'on veut faire (correspond aux actions dans le routeur)
     * @param array  $params : Facultatif, les paramètres de l'action sous la forme ['param1' => 'valeur1', 'param2' => 'valeur2']
     */
    public static function redirect(string $action, array $params = []): never
    {
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit;
    }

    /**
     * Cette méthode retourne le code js a insérer en attribut d'un bouton.
     * pour ouvrir une popup "confirm", et n'effectuer l'action que si l'utilisateur
     * a bien cliqué sur "ok".
     *
     * @param string $message : le message à afficher dans la popup
     *
     * @return string : le code js à insérer dans le bouton
     */
    public static function askConfirmation(string $message): string
    {
        return "onclick=\"return confirm('$message');\"";
    }

    // Methode permettant de renvoyer la difference entre une date et maintenant, en renvoyant le nb de jour si la date est inferieure à 1 mois, sinon la date en mois si la date est inferieur a 1 an et sinon le nombre d'année
    public static function dateDiff(DateTime $date): string
    {
        $now = new DateTime();
        $interval = $now->diff($date);
        if ($interval->days < 30) {
            return $interval->days . ' jours';
        } elseif ($interval->days < 365) {
            return $interval->m . ' mois';
        } else {
            return $interval->y . ' ans';
        }
    }

    public static function format(string $string): string
    {
        // Etape 1, on protège le texte avec htmlspecialchars.
        $finalString = htmlspecialchars($string, ENT_QUOTES);

        // Etape 2, le texte va être découpé par rapport aux retours à la ligne,
        $lines = explode("\n", $finalString);

        // On reconstruit en mettant chaque ligne dans un paragraphe (et en sautant les lignes vides).
        $finalString = '';
        foreach ($lines as $line) {
            if ('' != trim($line)) {
                $finalString .= "<p>$line</p>";
            }
        }

        return $finalString;
    }

    /**
     * Cette méthode permet de récupérer une variable de la superglobale $_REQUEST.
     * Si cette variable n'est pas définie, on retourne la valeur null (par défaut)
     * ou celle qui est passée en paramètre si elle existe.
     *
     * @param string $variableName : le nom de la variable à récupérer
     * @param mixed  $defaultValue : la valeur par défaut si la variable n'est pas définie
     *
     * @return mixed : la valeur de la variable ou la valeur par défaut
     */
    public static function request(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    public static function uploadFile($file, $target_dir, $rename): string
    {
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File is not an image.");
        }

        if (file_exists($target_file)) {
            throw new Exception("Sorry, file already exists.");
        }

        if ($file["size"] > 500000) {
            throw new Exception("Sorry, your file is too large.");
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }

        if ($rename) {
            $newName = $target_dir . $rename . '_' . uniqid() . '.' . $imageFileType;
            rename($target_file, $newName);
            $target_file = $newName;
        }

        return $target_file;
    }

    public static function shortenText(string $text, int $maxLength): string
    {
        if (strlen($text) > $maxLength) {
            $text = substr($text, 0, $maxLength);
            $text = substr($text, 0, strrpos($text, ' '));
            $text .= '...';
        }
        return $text;
    }


}