<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class Summarize2ndGraderController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSummarize2ndGraderPrompt($description, $language) {

        switch ($language) {
            case 'en-US':
                    $prompt = "Summarize this text for 2nd grader:\n\n" . $description . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "تلخيص هذا النص لطلاب الصف الثاني:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为二年级学生总结这篇课文：\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Sažmi ovaj tekst za učenika 2. razreda:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Shrňte tento text pro žáka 2. třídy:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Opsummer denne tekst for 2. klasse:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Vat deze tekst samen voor groep 2:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Tee sellest tekstist kokkuvõte 2. klassi õpilasele:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Tee yhteenveto tästä tekstistä 2. luokkalaiselle:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Résumez ce texte pour un élève de 2e :\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Fass diesen Text für die 2. Klasse zusammen:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Σύνοψτε αυτό το κείμενο για μαθητή της Β' δημοτικού:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "סכם את הטקסט הזה עבור כיתה ב':\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस पाठ को दूसरे ग्रेडर के लिए सारांशित करें:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Összefoglalja ezt a szöveget 2. osztályosnak:\n\n" . $description . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Taktu saman þennan texta fyrir 2. bekk:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Ringkaskan teks ini untuk siswa kelas 2:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Riassumi questo testo per la seconda elementare:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "2 年生向けにこのテキストを要約してください:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "2학년을 위해 이 텍스트 요약:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Ringkaskan teks ini untuk pelajar gred 2:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Oppsummer denne teksten for 2. klassing:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Podsumuj ten tekst dla uczniów drugiej klasy:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Resuma este texto para aluno da 2ª série:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Обобщите этот текст для второклассника:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Resuma este texto para el alumno de segundo grado:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Sammanfatta den här texten för klass 2:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "2. sınıf öğrencisi için bu metni özetleyin:\n\n" . $description . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Resuma este texto para aluno da 2ª série:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Rezumați acest text pentru elevul de clasa a II-a:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tóm tắt văn bản này cho học sinh lớp 2:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Fanya muhtasari wa maandishi haya kwa mwanafunzi wa darasa la 2:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Povzemite to besedilo za 2. razred:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
