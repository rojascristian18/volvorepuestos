<?php
if ( BreadcrumbComponent::$visible && ! empty($breadcrumbs) )
{
foreach ( $breadcrumbs as $breadcrumb )
{
$this->Html->addCrumb($breadcrumb[0], $breadcrumb[1]);
}
?>


<div class="hidden-xs breadcrums-wrapper general-wrapper-amarillo">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <?
                echo $this->Html->getCrumbList(array('class' => 'breadcrumb'));
             ?>   
            </div>
        </div>
    </div>
</div>
 
 
<?
}
?>


