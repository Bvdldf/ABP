{assign var="order_no" value=$order->get('order_no')}
{assign var="order_date" value=$order->get('order_date')}
{assign var="program" value=$order->get('program')}
{assign var="start_date" value=$order->get('start_date')}
{assign var="end_date" value=$order->get('end_date')}
{assign var="chairman_firstname" value=$chairman->get('first_name')}
{assign var="chairman_lastname" value=$chairman->get('last_name')}
{assign var="chairman_title" value=$chairman->get('title')}


<table width="100%">
    <tbody>
        <tr>
            <td align="center">
                <h1>ПРОТОКОЛ №{$protocol_no}</h1>
            </td>
        </tr>
    </tbody>
</table>

<p align='justify'>Заседания комиссии по проверке знаний по пожарно-техническому минимуму в соответствии с приказом директора {$orgName} от {$order_date} №{$order_no}</p>

<p>Квалификационная комиссия в составе:</p>

<table>
    <tbody>
        <tr>
            <td width='20%'>Председатель:</td>
            <td width='40%'>{$chairman_title}</td>
            <td width='20%'>{$chairman_lastname} {$chairman_firstname}</td>
        </tr>
        {foreach from=$members item=member name=commissionloop}
            {assign var="member_firstname" value=$member->get('first_name')}
            {assign var="member_lastname" value=$member->get('last_name')}
            {assign var="member_title" value=$member->get('title')}
            <tr style='padding: 10px auto;'>
                <td>{if $smarty.foreach.commissionloop.first}Члены комиссии:{/if}</td>
                <td>{$member_title}</td>
                <td>{$member_lastname} {$member_firstname}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

    
<p>
    {$order_date} провела проверку знаний по программе «<u>{$program}</u>» в объёме 16 часов, срок обучения с {$start_date} по {$end_date}:
</p>

<table border="1" align="center" width="100%">
    <thead>
        <tr>
            <th>№<br>п/п</th>
            <th>№ удостоверения</th>
            <th>Фамилия Имя Отчество</th>
            <th>Должность</th>
            <th>Место работы</th>
            <th>Оценка</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$items item=item name=itemsloop}
            {assign var="item_firstname" value=$item->get('firstname')}
            {assign var="item_lastname" value=$item->get('lastname')}
            {assign var="item_title" value=$item->get('title')}
            {assign var="account_id" value=$item->get('account_id')}
            
            <tr>
                <td>{$smarty.foreach.itemsloop.index+1}</td>
                <td></td>
                <td>{$item_lastname} {$item_firstname}</td>
                <td>{$item_title}</td>
                <td>
                    {if $account_id}
                        {assign var="account_instance" value=Accounts_Record_Model::getInstanceById($account_id)}
                        {assign var="account_name" value=$account_instance->get('accountname')}
                        {$account_name}
                    {/if}
                </td>
                <td></td>
            </tr>
        {/foreach}
    </tbody>
</table>
    <br><br><br>
<table>
    <tbody>
        <tr>
            <td><strong>Председатель комиссии:</strong></td>
            <td>____________________</td>
            <td><strong>{$chairman_lastname} {$chairman_firstname}</strong></td>
        </tr>
        {foreach from=$members item=member name=commissionloop}
            {assign var="member_firstname" value=$member->get('first_name')}
            {assign var="member_lastname" value=$member->get('last_name')}
            {assign var="member_title" value=$member->get('title')}
            <tr style='padding: 10px auto;'>
                <td><strong>{if $smarty.foreach.commissionloop.first}Члены комиссии:{/if}</strong></td>
                <td>____________________</td>
                <td><strong>{$member_lastname} {$member_firstname}</strong></td>
            </tr>
        {/foreach}
    </tbody>
</table>

<p><strong>М.П.<br>{$protocol_date}</strong></p>
