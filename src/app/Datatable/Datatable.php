<?php /** @noinspection PhpUndefinedFieldInspection */


namespace App\Datatable;


use App\Datatable\Buttons\Collection;
use Illuminate\Support\Str;
use Route;

class Datatable
{
    private static string $cssCDN = '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf-6.4.3/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.css"/>';
    private static string $jsCDN = '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/zf-6.4.3/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.js"></script>';
    private static string $startPart = '<script>$(document).ready( function () { $(@@).DataTable(';
    private static string $endPart = ')});</script>';

    /**
     * Datatable constructor.
     */
    public function __construct(private string $id)
    {
    }


    public static function for($id)
    {
        return new self($id);
    }

    public static function DefaultFilename(): string
    {
        return Str::of(Route::current()?->getName() ?? 'Empty')
                ->replace('.', ' ')
                ->title()
            . " - "
            . now()->toDateString();
    }

    private static function Layout(): DatatableLayout
    {
        return new DatatableLayout();
    }

    public function __toString(): string
    {
        return
            self::$jsCDN
            .str_replace('@@', $this->id , self::$startPart)
            .json_encode($this, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT, 512)
            . self::$endPart;
    }

    public function reorderable(): static
    {
        $this->colReorder = true;
        return $this;
    }

    public static function css() : string{
        return self::$cssCDN;
    }

    public function dom(string $dom): static
    {
        $this->dom = $dom;
        return $this;
    }

    public function buttons(array $buttons): static
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function addButton(Button $button): static{
        if(!$this->buttons){
            $this->buttons = [$button];
        }else{
            $this->button[] = $button;
        }
        return $this;
    }

    public function addButtonIf(Button $button, bool $predicate): static{
        if ($predicate) {
            if(!$this->buttons){
                $this->buttons = [$button];
            }else{
                $this->button[] = $button;
            }
        }
        return $this;
    }

    public function withExports(): static
    {
        //'fBrtip'
        $this->dom(
            self::Layout()
                ->filteringInput()
                ->Buttons()
                ->processingDisplayElement()
                ->table()
                ->informationSummary()
                ->pagination()
        )->buttons([Collection::exports()]);
        return $this;
    }
}
