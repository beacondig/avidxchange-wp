<?php

class RoiCalculator
{
    const FORM_NAME = 'ROI Calculator';
    const SHORTCODE = 'roi_calculator';
    const RELATIVE_SCRIPT_LOCATION = '../js/custom/roi_calculator_script.js';

    protected $text = 'Find out how much you can save with AvidXchange';
    protected $button_text = 'Calculate Your ROI';

    public static $auto_add_shortcode = true;

    public function __construct($atts = [])
    {
        if(!empty($atts)) {
            if(array_key_exists('text', $atts)) {
                $this->text = $atts['text'];
            }
            if(array_key_exists('button_text', $atts)) {
                $this->button_text = $atts['button_text'];
            }
        }
    }

    public static function get($atts)
    {
        return new RoiCalculator($atts);
    }

    public static function add_shortcode()
    {
        add_shortcode(static::SHORTCODE, array(static::class, 'get'));
    }

    public function __toString()
    {
        $cta = $this->getCallToAction();
        $script = $this->getScript();
        $form = $this->getForm();
        $results = $this->getResultsTemplate();
        return <<<HTML
        <div class="roi-calculator-container">
            $cta
            <div class="modal fade roi-calculator-form-modal" id="roi-calculator-form-modal" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="modal_print_content" class="modal-body">
                            <span class="header">Calculate Your ROI</span>
                            $form
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $script;
            </script>
        </div>
HTML;
    }

    public function getScript()
    {
        return file_get_contents(__DIR__.DIRECTORY_SEPARATOR.static::RELATIVE_SCRIPT_LOCATION);
    }

    public function getCallToAction()
    {
		/* <p>{$this->text}</p> */
        return <<<HTML
        <div class="roi-calculator">
            <a class="secondarybutton mediumbutton" href="#" data-toggle="modal" data-target="#roi-calculator-form-modal">{$this->button_text}</a>
        </div>
HTML;
    }

    protected function getForm()
    {
        $form = gravity_form(static::FORM_NAME, false, false, false, null, true, 0, false);
        return $form;
    }

    public function getResultsTemplate()
    {
        $share = do_shortcode('[cresta-social-share]');
        return <<<HTML
            <div class="share">
                <span class="share-text">Share with Your Coworkers</span>
                {$share}
            </div>
            <div class="results">
                <ul class="user-inputs">
                    Invoices Per Month: <li class="user-invoices"></li>
                    Payments Per Month: <li class="user-payments"></li>
                    AP Staff: <li class="user-staff"></li>
                </ul>
                <div class="savings dollars">
                    <span class="amount">
                    
                    </span>
                    <svg x="0px" y="0px" width="100%" height="100%" viewBox="0 0 54 54" class="fullCircle">
                        <circle fill="transparent" stroke="#a4d137" stroke-width="2" cx="27" cy="21" r="17" stroke-dasharray="107 107"></circle>
                    </svg>
                    <h3><strong>Your Total Savings</strong> Per Month</h3>
                </div>
                <div class="savings manHours">
                    <span class="amount">

                    </span>
                    <svg x="0px" y="0px" width="100%" height="100%" viewBox="0 0 54 54" class="fullCircle">
                        <circle fill="transparent" stroke="#a4d137" stroke-width="2" cx="27" cy="21" r="17" stroke-dasharray="107 107"></circle>
                    </svg>
                    <h3><b>Your Man Hours Saved</b> Per Month</h3>
                </div>
                <div class="compareYourSavings">
                    <h3>Compare your savings with AvidXchange to AP industry standards</h3>
                    <hr>
                    <div class="processingCosts invoice">
                        <h4><strong>Invoice Processing Costs</strong> Per Month</h4>
                        <ul class="compareCosts">
                            <li class="industry">
                                <p class="industry">Industry Average</p>
                                <span class="cost">
                                
                                </span>
                            </li>
                            <li class="avid">
                                <p class="avid">AvidXchange</p>
                                <span class="cost">
                                
                                </span>
                            </li>
                        </ul>
                        <div class="monthlySavings">
                            <div class="info">
                                <p>Your Monthly Savings</p>
                                <span class="amount">
                                
                                </span>
                            </div>
                            <div class="graph">
                                <span class="industry" style="height:100%">
                                <span class="marker"></span>
                                </span>
                                <span class="avid avidGraph">
                                <span class="marker"></span>
                                </span>
                                <span class="percentage">
                                
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="processingCosts paperCheck">
                        <h4><strong>Paper Check Processing Costs</strong> Per Month</h4>
                        <ul class="compareCosts">
                            <li class="industry">
                                <p class="industry">Industry Average</p>
                                <span class="cost">
                                
                                </span>
                            </li>
                            <li class="avid">
                                <p class="avid">AvidXchange</p>
                                <span class="cost">
                                
                                </span>
                            </li>
                        </ul>
                        <div class="monthlySavings">
                            <div class="info">
                                <p>Your Monthly Savings</p>
                                <span class="amount">
                                
                                </span>
                            </div>
                            <div class="graph">
                                <span class="industry" style="height:100%">
                                <span class="marker"></span>
                                </span>
                                <span class="avid avidGraph">
                                <span class="marker"></span>
                                </span>
                                <span class="percentage">
                                
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <!--<button class="print-results secondarybutton mediumbutton">
                    Print Your Results
                    <i class="fa fa-print"></i>
                </button>-->
            </div>                 
HTML;
    }
}

if (RoiCalculator::$auto_add_shortcode) {
    RoiCalculator::add_shortcode();
}
?>
