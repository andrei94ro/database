<?php
namespace Xelyos\Database\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Xelyos\Database\Models\XelyosDatabaseModel;

class XelyosDatabaseConsole extends Command
{
    protected XelyosDatabaseModel $xelyosDatabaseModel;

    public function __construct(XelyosDatabaseModel $xelyosDatabaseModel)
    {
        parent::__construct();
        $this->xelyosDatabaseModel = $xelyosDatabaseModel;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xelyos:database:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Laravel Database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        [$success, $message] = $this->xelyosDatabaseModel->createDatabase();

        if ($success) {
            $this->info($message);
        } else {
            $this->error($message);
        }
    }
}
