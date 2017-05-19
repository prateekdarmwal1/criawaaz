<style>
    #dataTables_info span a{
        float:left;
        color: #FFF;
        height:20px;
        padding:0 10px;
        display:block;
        font-size:12px;
        line-height:20px;
        text-align:center;
        cursor:pointer;
        outline:none;
        background-color:#444444;

        border-right:1px solid #232323;
        border-left:1px solid #666666;

        border-right:1px solid rgba(0, 0, 0, 0.5);
        border-left:1px solid rgba(255, 255, 255, 0.15);

        -webkit-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -o-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -moz-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -khtml-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
    }
    .paginate_buttons a{
        color: #FFF;
        text-decoration: none;
    }
    .paginate_buttons{
        float:left;
        color: #FFF;
        height:20px;
        padding:0 10px;
        display:block;
        font-size:12px;
        line-height:20px;
        text-align:center;
        cursor:pointer;
        outline:none;
        background-color:#444444;

        border-right:1px solid #232323;
        border-left:1px solid #666666;

        border-right:1px solid rgba(0, 0, 0, 0.5);
        border-left:1px solid rgba(255, 255, 255, 0.15);

        -webkit-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -o-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -moz-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -khtml-box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        box-shadow:0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
    }
</style>
<?php

?>
<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <div class="dataTables_info" id="DataTables_Table_1_info">
        <?php echo $this->Paginator->counter(
        'Showing From {:start} to {:end} of {:count}'
        );?>
    </div>
    <div class="dataTables_paginate paging_full_numbers" id="pagination-class">
        <?php if($this->Paginator->counter('{:pages}') > 0) {
              echo $this->Paginator->first('First',
                array( 'tag' => 'span','class'=>'paginate_buttons'), null,
                array('class' => 'first paginate_buttons'));

            echo $this->Paginator->prev('Previous',
                array( 'tag' => 'span','class'=>'paginate_buttons'), null,
                array('class' => 'previous paginate_buttons'));

            echo $this->Paginator->numbers(
                array(
                    'separator' => '',
                    'class' =>'paginate_buttons',
                    'currentClass' =>'paginate_active',
                    'after' => '',
                    'before' => ''
                ));
            echo $this->Paginator->next('Next',
                array( 'tag' => 'span','class'=>'paginate_buttons'), null,
                array('class' => 'previous paginate_buttons'));
            echo $this->Paginator->last('Last',
                array( 'tag' => 'span','class'=>'paginate_buttons'), null,
                array('class' => 'previous paginate_buttons'));
            ?>
        <?php } ?>
    </div>
