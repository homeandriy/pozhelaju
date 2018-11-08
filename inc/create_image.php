<?php
class ImageCreate
{
    /**
     * @var $settings - НАСТРОЙКИ
     * src  - Путь к изображению, на которое нанесём текст
     * size - Размер шрифта
     * top  - Отступ сверху
     * left - Отступ слева
     * font - Путь к файлу шрифта
     * save - Путь для сохранения
     */
    private $settings = [
        "src"  => "image.jpg",
        "size" => 26,
        "top"  => 260,
        "left" => 220,
        "font" => "ariali.ttf",
        "save" => "images/"
    ];

    /**
     *
     * @var Содержит пользовательский текст
     *
     */
    private $text;

    /**
     *
     * @param пользовательский текст $text
     *
     */
    public function __construct($text){
        $this->text = $text;
    }

    /**
     *
     * @return путь к созданному изображению
     *
     */
    public function create()
    {
        # Открываем рисунок в формате JPEG
        $img = imagecreatefromjpeg($this->settings["src"]);

        # Получаем идентификатор цвета
        $color = imagecolorallocate($img, 250, 0, 0);

        /* выводим текст на изображение */
        imagettftext(
            $img,
            $this->settings["size"],
            0,
            $this->settings["left"],
            $this->settings["top"],
            $color,
            $this->settings["font"],
            $this->text
        );

        # Генерируем путь для сохранения
        $path = $this->settings["save"] . microtime(true) . ".jpg";

        # Сохраняем рисунок в формате JPEG
        imagejpeg($img, $path, 100);

        # Освобождаем память и закрываем изображение
        imagedestroy($img);

        # Возвращаем путь
        return $path;
    }
}

# Если нажата кнопка "Нанести на картинку"
if(isset($_POST["submit"])){
    # Если поле для текста не пусто
    if(empty($_POST["text"]))
        # Сообщение
        echo "Введите текст!";
    else{
        # Получаем объект класса наложения текста
        $image = new ImageCreate($_POST["text"]);

        # Генерируем изображение и получаем путь
        $path = $image->create();
    }
}
?>

<?php if(empty($path)):?>
    <form method="post">
        <input type="text" name="text" placeholder="Введите текст" />
        <input type="submit" name="submit" value="Нанести на картинку" />
    </form>
<?php else:?>
    Изображение: <a href="<?=$path?>"><?=$path?></a>
<?php endif; ?>