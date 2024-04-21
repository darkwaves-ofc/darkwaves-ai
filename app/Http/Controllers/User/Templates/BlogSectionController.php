<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class BlogSectionController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBlogSectionPrompt($title, $subheadings, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Write a full blog section with at least 5 large paragraphs about:\n\n" . $title . "\n\nSplit by subheadings:\n" . $subheadings . "\n\nTone of voice of the paragraphs must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب قسم مدونة كاملًا يحتوي على 5 فقرات كبيرة على الأقل حول:\n\n". $title. "\n\nانقسام حسب العناوين الفرعية:\n". $subheadings. "\n\nيجب أن تكون نغمة صوت الفقرات:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一个完整的博客部分，其中至少包含 5 个大段落：\n\n". $title. "\n\n按副标题拆分：\n" . $subheadings."\n\n段落的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite cijeli odjeljak bloga s najmanje 5 velikih odlomaka o:\n\n" . $title. "\n\nPodijeli po podnaslovima:\n" . $subheadings. "\n\nTon glasa odlomaka mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište celou sekci blogu s alespoň 5 velkými odstavci o:\n\n" . $title . "\n\nRozdělit podle podnadpisů:\n" . $subheadings . "\n\nTón hlasu odstavců musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en komplet blogsektion med mindst 5 store afsnit om:\n\n" . $title. "\n\nOpdelt efter underoverskrifter:\n" . $subheadings . "\n\nTonefaldet i afsnittene skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een volledig bloggedeelte met minimaal 5 grote paragrafen over:\n\n" . $title . "\n\nGesplitst door subkoppen:\n" . $subheadings . "\n\nDe toon van de alinea's moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage terve blogijaotis vähemalt 5 suure lõiguga teemal:\n\n" . $title . "\n\nJagatud alampealkirjade järgi:\n" . $subheadings. "\n\nLõigete hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita koko blogiosio, jossa on vähintään 5 suurta kappaletta aiheesta:\n\n" . $title . "\n\nJaettu alaotsikoiden mukaan:\n" . $subheadings . "\n\nKappaleiden äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez une section de blog complète avec au moins 5 grands paragraphes sur :\n\n" . $title. "\n\nDiviser par sous-titres :\n" . $subheadings . "\n\nLe ton de la voix des paragraphes doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie einen vollständigen Blog-Abschnitt mit mindestens 5 großen Absätzen über:\n\n" . $title . "\n\nAufgeteilt nach Unterüberschriften:\n" . $subheadings . "\n\nTonfall der Absätze muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια πλήρη ενότητα ιστολογίου με τουλάχιστον 5 μεγάλες παραγράφους σχετικά με:\n\n" . $title . "\n\nΔιαίρεση κατά υποτίτλους:\n" . $subheadings. "\n\nΟ τόνος της φωνής των παραγράφων πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב מדור בלוג מלא עם לפחות 5 פסקאות גדולות על:\n\n" . $title . "\n\nפיצול לפי כותרות משנה:\n" . $subheadings . "\n\nטון הדיבור של הפסקאות חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस बारे में कम से कम 5 बड़े अनुच्छेदों के साथ एक पूर्ण ब्लॉग अनुभाग लिखें:\n\n" .$title."\n\nउपशीर्षकों द्वारा विभाजित करें:\n" . $subheadings. "\n\nपैराग्राफ की आवाज का स्वर होना चाहिए:\n" . $tone_language."\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon egy teljes blogrészt, legalább 5 nagy bekezdéssel erről:\n\n" . $title . "\n\nAlcímek szerint felosztva:\n" . $subheadings . "\n\nA bekezdések hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu heilan blogghluta með að minnsta kosti 5 stórum málsgreinum um:\n\n" . $title. "\n\nDeilt eftir undirfyrirsögnum:\n" . $subheadings. "\n\nTónn málsgreina verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis bagian blog lengkap dengan setidaknya 5 paragraf besar tentang:\n\n" . $title. "\n\nDibagi berdasarkan subjudul:\n" . $subheadings . "\n\nNada suara paragraf harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi una sezione completa del blog con almeno 5 paragrafi di grandi dimensioni su:\n\n" . $title . "\n\nDiviso per sottotitoli:\n" . $subheadings . "\n\nIl tono di voce dei paragrafi deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "次の内容について、少なくとも 5 つの大きな段落を含む完全なブログ セクションを作成します:\n\n" . $title. "\n\n小見出しで分割:\n" . $subheadings . "\n\n段落の口調は次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대해 최소 5개의 큰 단락으로 전체 블로그 섹션을 작성하세요.\n\n" . $title. "\n\n하위 제목으로 분할:\n" . $subheadings . "\n\n문단의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis bahagian blog penuh dengan sekurang-kurangnya 5 perenggan besar tentang:\n\n" . $title. "\n\nPisah mengikut subtajuk:\n" . $subheadings . "\n\nNada suara perenggan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en fullstendig bloggseksjon med minst 5 store avsnitt om:\n\n" . $title. "\n\nSplitt etter underoverskrifter:\n" . $subheadings . "\n\nTone i avsnittene må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz pełną sekcję bloga zawierającą co najmniej 5 dużych akapitów na temat:\n\n" . $title . "\n\nPodział według podtytułów:\n" . $subheadings . "\n\nTon głosu akapitów musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma seção de blog completa com pelo menos 5 parágrafos grandes sobre:\n\n" . $title. "\n\nDivisão por subtítulos:\n" . $subheadings . "\n\nTom de voz dos parágrafos deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите полный раздел блога, содержащий не менее 5 больших абзацев о:\n\n" . $title . "\n\nРазделить по подзаголовкам:\n" . $subheadings . "\n\nТон озвучивания абзацев должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe una sección de blog completa con al menos 5 párrafos extensos sobre:\n\n" . $title . "\n\nDividir por subtítulos:\n" . $subheadings. "\n\nEl tono de voz de los párrafos debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en fullständig bloggsektion med minst 5 stora stycken om:\n\n" . $title . "\n\nDela upp efter underrubriker:\n" . $subheadings . "\n\nTonfallet i styckena måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şununla ilgili en az 5 büyük paragraf içeren eksiksiz bir blog bölümü yazın:\n\n" . $title. "\n\nAlt başlıklara göre ayır:\n" . $subheadings . "\n\nParagrafların ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva uma seção de blog completa com pelo menos 5 parágrafos grandes sobre:\n\n" . $title. "\n\nDivisão por subtítulos:\n" . $subheadings . "\n\nTom de voz dos parágrafos deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o secțiune completă de blog cu cel puțin 5 paragrafe mari despre:\n\n" . $title . "\n\nDivizat după subtitluri:\n" . $subheadings . "\n\nTonul de voce al paragrafelor trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một mục blog đầy đủ với ít nhất 5 đoạn văn lớn về:\n\n" . $title . "\n\nChia theo tiêu đề phụ:\n" . $subheadings . "\n\nGiọng điệu của đoạn văn phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika sehemu kamili ya blogu iliyo na angalau aya 5 kubwa kuhusu:\n\n" . $title. "\n\nGawanya kwa vichwa vidogo:\n" . $subheadings . "\n\nToni ya sauti ya aya lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite celoten razdelek spletnega dnevnika z vsaj 5 velikimi odstavki o:\n\n" . $title. "\n\nRazdeljeno po podnaslovih:\n" . $subheadings. "\n\nTon glasu odstavkov mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
