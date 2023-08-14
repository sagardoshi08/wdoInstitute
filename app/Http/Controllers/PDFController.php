<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class PDFController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $filePath = public_path("qq.pdf");
        $outputFilePath = public_path("offer_letter/sample_output.pdf");
        $this->fillPDFFile($filePath, $outputFilePath);

         return response()->file($outputFilePath);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fillPDFFile($file, $outputFilePath)
    {
        $fpdi = new FPDI;

        $count = $fpdi->setSourceFile($file);

        for ($i=1; $i<=$count; $i++) {

            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            if($i==1){
                $fpdi->SetFont("helvetica", "", 15);
                $fpdi->Text('135','59',"12/07/2023");
                $fpdi->SetFont("helvetica", "", 14);
                $fpdi->Text('31','147.50',"13/07/2023");
                $fpdi->SetFont("helvetica", "", 13);
                $fpdi->Text('83','156',"2 days");
                $fpdi->SetFont("helvetica", "B", 13);
                $fpdi->Text('134','191',"13/07/2023");
                $fpdi->SetFont("helvetica", "B", 15);
                $fpdi->Text('32','118',"Yogita Upadhyay,");
                $fpdi->SetTextColor(255,0,0);
                $fpdi->Text('18','76',"Yogita Upadhyay,");
                $fpdi->SetFont("helvetica", "", 12);
                $fpdi->Text('36','84',"Saraswat Enclave, Station Road, Tundla,District- Firozabad,283204");
                $fpdi->SetFont("helvetica", "", 14);
                $fpdi->Text('109','141.50',"Content  writer  and  back  office");
            }
            if($i==4){
                $fpdi->SetFont("helvetica", "", 13); 
                $fpdi->SetTextColor(0,0,0);
                $fpdi->Text('38.50','113',"24");
                $fpdi->Text('145','113',"2");
                $fpdi->SetTextColor(255,0,0);
                $fpdi->Text('117','100',"9:00 AM to 6:00 PM Monday to Friday. ");
                $fpdi->Text('21','107',"Saturday and Sunday are holidays ");

            }
            if($i==8){
                
                $fpdi->SetTextColor(0,0,0);
                $fpdi->SetFont("helvetica", "", 14);
                $fpdi->Text('116','178',"Yogita Upadhyay");
                $fpdi->Text('116','185',"Content writer and back office");
                $fpdi->Text('116','193',"12/07/2023");
                $fpdi->Text('116','199',"13/07/2023");
                $fpdi->Text('116','234.50',"20,000");
                //HRA
                $fpdi->Text('116','216.50',"100");
                //Conveyance Allowance 
                $fpdi->Text('116','222.50',"200");
                //Special Allowance 
                $fpdi->Text('116','228.50',"300");
                //Mobile Allowance
                $fpdi->Text('116','252.50',"300");
                //Insurance benefits
                $fpdi->Text('116','258.50',"300");
                //Gratuity
                $fpdi->Text('116','264.50',"300");

                $fpdi->Text('116','240.50',"1,000");
                $fpdi->Text('116','246.50',"1,000");
                $fpdi->SetTextColor(255,0,0);
                $fpdi->Text('116','210.50',"20,000");
                $fpdi->Text('116','270.25',number_format('240000',0, ".", ","));

            }
        }

        return $fpdi->Output($outputFilePath, 'F');
    }
}
