<?php

class rex_aufgaben_kanban
{
    private function getAddonDetails()
    {
        $addon = rex_addon::get("aufgaben");
        $owner = $addon->getConfig('kanban-owner');
        $prio = $addon->getConfig('kanban-prio');
        
        return $array = array(
            "owner" => $owner,
            "prio" => $prio
        );
    }

    function getEigentuemer($eigentuemerId)
    {
        if (!rex_aufgaben_kanban::getAddonDetails()["owner"])
        {
            return false;
        }
        
        $sql_eigentuemer = rex_sql::factory();
        $sql_eigentuemer->setTable('rex_user');
        $sql_eigentuemer->setWhere('id = ' . $eigentuemerId);
        $sql_eigentuemer->select('*');

        return '<span class="label label-default">'. $sql_eigentuemer->getValue('login') .'</span>';
    }

    function getStatusLinks($currentid, $itemid)
    {
        $statussql = rex_sql::factory();
        //$sql->setDebug();
        $statussql->setTable(rex::getTablePrefix() . 'aufgaben_status');
        $statussql->select();

        $currentclass = "";

        $status = "<hr>";
        $status .= "<div class='status'>";
        for ($i = 0; $i < $statussql->getRows(); $i++)
        {
            if ($currentid == $statussql->getValue('id'))
            {
                $currentclass = "current";
            }
            else
            {
                $currentclass = "";
            }

            if ($statussql->getValue('id') == 6)
            {
                $currentclass .= " done";
            }

            $status .= "<a href='#' class='change-status " . $currentclass . "' data-id='" . $itemid . "' data-statusid='" . $statussql->getValue('id') . "' title='" . $statussql->getValue('status') . "'><i class='rex-icon " . $statussql->getValue('icon') . "'></i></a>";
            $statussql->next();
        }
        $status .= "</div>";

        return $status;
    }

    function getPrioLinks($currentid, $itemid)
    {
        if (!rex_aufgaben_kanban::getAddonDetails()["prio"])
        {
            return false;
        }

        $priosql = rex_sql::factory();
        //$sql->setDebug();
        $priosql->setTable(rex::getTablePrefix() . 'aufgaben_aufgaben');
        $priosql->setTable('rex_aufgaben_aufgaben');
        $priosql->setWhere('id = ' . $itemid);
        $priosql->select('*');
        $prioArray = $priosql->getArray();
        $currentclass = "";

        $prio = "<div class='prio-wrapper'>";
        $prio .= "<a href='#' class='change-prio' data-id='" . $itemid . "' data-prioid='0'><i class='fa fa-star-o' aria-hidden='true'></i></a>";
        for ($i = 0; $i < 3; $i++)
        {
            if ($i + 1 == $prioArray[0]["prio"])
            {
                $currentclass = "current";
            }
            else
            {
                $currentclass = "";
            }

            $prio .= "<a href='#' class='change-prio " . $currentclass . "' data-id='" . $itemid . "' data-prioid='" . ($i + 1) . "'><i class='fa fa-star' aria-hidden='true'></i></a>";
        }
        $prio .= "</div>";

        return $prio;
    }
}