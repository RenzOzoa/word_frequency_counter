<!DOCTYPE html>
<html>
<head>
    <title>Word Frequency Counter</title>
</head>
<body>
    <h1>Word Frequency Counter</h1>
    <form method="post" action="">
        <label for="inputText">Enter Text:</label>
        <textarea name="inputText" id="inputText" rows="5" cols="40"></textarea>
        <br>
        <input type="submit" name="submit" value="Count Words">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $inputText = $_POST["inputText"];

     
        $inputText = strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $inputText));

    
        $words = str_word_count($inputText, 1);

     
        $wordFrequency = array_count_values($words);

    
        arsort($wordFrequency);

    
        echo "<h2>Word Frequencies:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Word</th><th>Frequency</th></tr>";
        foreach ($wordFrequency as $word => $frequency) {
            echo "<tr><td>$word</td><td>$frequency</td></tr>";
        }
        echo "</table>";
    }
    ?>