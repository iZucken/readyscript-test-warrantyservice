{addcss file="{$mod_css}/warranty_service.css" basepath="root"}
<div class="warranty-service">
    <div class="service-points-list">
        {foreach from=$service_point_list item=service_point}
            <a class="service-points-list-item" href="{$router->getUrl('warrantyservice-front-servicepoint', ["id" => $service_point.id])}">
                <p class="title">{$service_point.title}</p>
                <hr>
                <p class="schedule">{$service_point.schedule}</p>
            </a>
        {/foreach}
    </div>
</div>