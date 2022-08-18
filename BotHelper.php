<?php


use TelegramBot\Api\BotApi;
use TelegramBot\Api\Types\CallbackQuery;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\Update;


class BotHelper
{

    /**
     * @param \TelegramBot\Api\Client | BotApi $bot
     */
    public static function initBot(\TelegramBot\Api\Client $bot)
    {
        session_start();
        $bot
            ->command(
                'start',
                static function (Message $message) use ($bot) {
                    try {
                        $chat_id = $message->getChat()->getId();


                    $link = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([[['text'=>"☎  Raqamni yuborish",'request_contact'=>true]]],null,true);
                    $bot->sendMessage($chat_id,"😊 Assalomu Alaykum!
                        
🤖 Botdan foydalanish uchun quyidagi tugma orqali raqamingizni tasdiqlang 👇",null,false,null,$link);
                    } catch (Exception $e) {
                    }

                    return true;
                })
            ->callbackQuery(
                static function (CallbackQuery $query) use ($bot) {
                    try {
                        $chatId = $query->getMessage()->getChat()->getId();
                        $data = $query->getData();
                        $messageId = $query->getMessage()->getMessageId();

                    } catch (Exception $e) {
                    }

                })
            ->editedMessage(
                static function (Message $message) use ($bot) {
                    try {

                    } catch (Exception $e) {
                    }
                })
            ->on(
                static function (Update $update) use ($bot) {
                    return true;
                },
                static function (Update $update) use ($bot) {
                    try {
                        $chat_id = $update->getMessage()->getFrom()->getId();
                        if ($update->getMessage()->getContact()){
                            $contact = $update->getMessage()->getContact()->getPhoneNumber();
                            $user = $update->getMessage()->getContact()->getFirstName();
                            $link=new \TelegramBot\Api\Types\ReplyKeyboardMarkup([[
                                ['text'=>'💻 Kurslar haqida'],['text'=>'📋 Kursga yozilish']],
                                [['text'=>'🚩 Aloqa va Manzil']]],null,true);
                            $bot->sendMessage($chat_id,"✅ $user raqamingiz tasdiqlandi\n
😊 Botga Xush kelibsiz !\n
O'quv markazimiz va kurslarimiz haqida ma'lumot olishingiz va kurslarimizga yozilishingiz mumkin.Buning uchun kerakli bo'limni menyudan tanlang 👇",null,false,null,$link);
                        }else{
                            $text=$update->getMessage()->getText();
                            if ($text=='🚩 Aloqa va Manzil'){
                                $bot->sendMessage($chat_id,"⚡️ 『 Web King 』

🕘 Ish vaqti: 9:00 dan 18:00 gacha

🚩 Manzil: Chinobod shaharchasi Web King oʻquv markazi binosi

📍 Mo'ljal: Big Burger kafesidan so'ng

📞️ Telefon: +998 99 999 99 99

🧑🏻‍💻 Bot developer: @xusanb0y");
                            }
                            if ($text=='💻 Kurslar haqida'){
                                $link=new \TelegramBot\Api\Types\ReplyKeyboardMarkup([
                                    [['text'=>'🔸 Kompyuter savodxonligi'],['text'=>'🔸 Robototexnika']],
                                    [['text'=>'🔹 Web dasturlash'],['text'=>'🔹 Mobil dasturlash']],
                                    [['text'=>'🔹 Desktop dasturlash'],['text'=>'🔹 Python dasturlash']],
                                    [['text'=>'🔸 IT English'],['text'=>'🔸 Grafik dizayn']],
                                    [['text'=>'🔙 Orqaga']]
                                ],null,true);
                                $bot->sendMessage($chat_id,"📌 Bizda mavjud kurslar:

• Kompyuter savodxonligi
• Robototexnika
• Web dasturlash
• Mobil dasturlash
• Desktop dasturlash
• Python dasturlash
• IT English
• Grafik dizayn

❕ Qo'shimcha ma'lumot quyidagi menyuda👇",null,false,null,$link);
                            }else{
                                if ($text=='🔸 Kompyuter savodxonligi'){
                                    $bot->sendMessage($chat_id,"🖥 Kompyuter savodxonligi

📚 Kompyuter bilan umumiy tanishuv, Ofis dasturlari (Word, Excel), internet bilan ishlash kabi bilimlar o'rgatiladi.

📅 Kurs davomiyligi: 1 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 1 soat

💰 Kurs narxi: 300 ming so'm
💳 To'lov usuli: PayMe/Bank");
                                }
                                if ($text=='🔸 Robototexnika'){
                                    $bot->sendMessage($chat_id,"🤖 Mobil robototexnika

📚 Arduino qurilmasi va dasturlash tili, buyruqlashtirish va avtomatlashtirish asoslari kabi bilimlar o'rgatiladi.

📆 Kurs davomiyligi: 3 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 2 soat

💰 Kurs narxi: 300 ming so'm/oyiga
💳 To'lov usuli: PayMe/Bank");
                                }
                                if ($text=='🔹 Web dasturlash'){
                                    $bot->sendMessage($chat_id,"🌐 Web dasturlash

📚 Frontend (HTML, CSS, JavaScript),  Bootstrap kabi bilimlar o'rgatiladi.

📆 Kurs davomiyligi: 3 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 2 soat

💰 Kurs narxi: 300 ming so'm/oyiga
💳 To'lov usuli: PayMe/Bank");
                                }
                                if ($text=='🔹 Mobil dasturlash'){
                                    $bot->sendMessage($chat_id,"📱 Mobil dasturlash

📚 Flutterga oid bilimlar o'rgatiladi.

📆 Kurs davomiyligi: 3 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 2 soat

💰 Kurs narxi: 300 ming so'm/oyiga
💳 To'lov usuli: PayMe/Bank");
                                }
                                if ($text=='🔹 Desktop dasturlash'){
                                    $bot->sendMessage($chat_id,"💻 Desktop dasturlash

📚  C++ dasturlash tili o'rgatiladi.

📆 Kurs davomiyligi: 10 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 2 soat

💰 Kurs narxi: 300 ming so'm/oyiga,
💳 To'lov usuli: PayMe/Bank.");
                                }
                                if ($text=='🔹 Python dasturlash'){
                                    $bot->sendMessage($chat_id,"🟠 Python

📚 Python dasturlash tili va uning fremworki sifatida Djangodan bilimlar beriladi.

📆 Kurs davomiyligi: 6 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 2 soat

💰 Kurs narxi: 300 ming so'm/oyiga
💳 To'lov usuli: PayMe/Bank");
                                }
                                if ($text=='🔸 IT English'){
                                    $bot->sendMessage($chat_id,"🇬🇧 IT English

📚 IT English kirish, IT sohasida Ingliz tili o'rni, IT sohasida ingliz tilidan foydalanish va natijaga erishish, xalqaro materiallar bilan ishlash kabi bilimlar o'rgatiladi.

📆 Kurs davomiyligi: 3 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 2 soat

💰 Kurs narxi: 300 ming so'm/oyiga
💳 To'lov usuli: PayMe/Bank");
                                }
                                if ($text=='🔸 Grafik dizayn'){
                                    $bot->sendMessage($chat_id,"🌠 Grafik dizayn

📚 Adobe Photoshop, Illustrator, Sigma, Corel draw kabi dasturlarda betakror dizayn qilish bo'yicha bilimlar berib boriladi.

📆 Kurs davomiyligi: 10 oy
🗓 1 haftada 3 kun dars
🕒 1 kunda 2 soat

💰 Kurs narxi: 300 ming so'm/oyiga
💳 To'lov usuli: PayMe/Bank");
                                }
                                if ($text=='🔙 Orqaga'){
                                    $link=new \TelegramBot\Api\Types\ReplyKeyboardMarkup([[
                                        ['text'=>'💻 Kurslar haqida'],['text'=>'📋 Kursga yozilish']],
                                        [['text'=>'🚩 Aloqa va Manzil']]],null,true);
                                    $bot->sendMessage($chat_id,"Avvalgi bo'limga qaytdingiz",null,false,null,$link);
                                }
                            }
                            if ($text=='📋 Kursga yozilish'){
                                $link2=new \TelegramBot\Api\Types\ReplyKeyboardMarkup([
                                    [['text'=>'🔸 Kompyuter savodxonligi'],['text'=>'🔸 Robototexnika']],
                                    [['text'=>'🔹 Web dasturlash'],['text'=>'🔹 Mobil dasturlash']],
                                    [['text'=>'🔸 IT English'],['text'=>'🔸 Grafik dizayn']],
                                    [['text'=>'🔙 Orqaga']]
                                ],null,true);
                                $bot->sendMessage($chat_id,"🟢 Hozirda quyidagi kurslarga qabul ketmoqda:

• Kompyuter savodxonligi
• Web dasturlash
• Mobil dasturlash
• Robototexnika
• IT English
• Grafik dizayn

❕ Qaysi yo'nalishda o'qishni xohlaysiz ?",null,false,null,$link2);
                            }else{
                                if ($text=='🔙 Orqaga'){}
                            }
                        }
                    } catch (Exception $e) {
                    }
                    return true;
                }
            );

        $bot
            ->command(
                'dev',
                static function (Message $message) use ($bot) {
                    try {
                        $chat_id = $message->getChat()->getId();
                        $bot->sendPhoto($chat_id,"https://www.trilogyed.com/blog/wp-content/uploads/2019/07/MG_7947-1.jpg","Hi 👋

🇺🇿 I'm Khusanboy

👨🏻‍💻 I'm web developer

✔️ Follow more 👇

🌐 My site: link

🔵 Telegram: @xusanboy_code

🟠 Instagram: link

🔴 You Tube: link

🟣 Github: link

🟢 Linkedin: link

📲 Contact me: @xusanb0y");
                    } catch (Exception $e) {
                    }

                    return true;
                });
        $bot
            ->command(
                'help',
                static function (Message $message) use ($bot) {
                    try {
                        $chat_id = $message->getChat()->getId();
                        $bot->sendMessage($chat_id,"❗️ Yordam uchun dasturchi bilan aloqaga chiqing !
                        
🟣 Aloqa: @xusanb0y");
                    } catch (Exception $e) {
                    }

                    return true;
                });
    }
}