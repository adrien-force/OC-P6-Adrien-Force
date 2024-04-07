<?php

class Utils
{
    /**
     * Redirige vers une URL.
     *
     * @param string $action : l'action que l'on veut faire (correspond aux actions dans le routeur)
     * @param array  $params : Facultatif, les paramètres de l'action sous la forme ['param1' => 'valeur1', 'param2' => 'valeur2']
     */
    public static function redirect(string $action, array $params = []): void
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


}