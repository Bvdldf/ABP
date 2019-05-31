{assign var="group_no" value=$studentgroup_id->get('group_no')}


<table width="100%">
  <tbody>
    <tr>
      <td align="left">
        {$order_date}
      </td>
      <td align="right">
        №{$order_no}
      </td>
    </tr>
  </tbody>
</table>

<div style="padding-left: 10rem;">
    
    {if $order_type != 'Отчисление'}
        
        {assign var=curator_firstname value=$curator->get('first_name')}
        {assign var=curator_lastname value=$curator->get('last_name')}
        
        {if $order_type == 'Зачисление'}
            
            <p><strong><i>О зачислении слушателей в {$orgName_short}</i></strong></p>
            <p align='justify'><font color="white">12345</font>В {$orgName_short} на обучение по программе «{$program}» прибыли слушатели. На основании вышеизложенного, <span style="letter-spacing: 5px;">приказываю</span>:
            <br>
            <ol>
                <li>Зачислить в учебную группу №{$group_no} слушателей с {$start_date} по {$end_date} (приложение №1)</li>
                <br>
                <li>Куратором учебной группы №{$group_no} назначить {$curator_lastname} {$curator_firstname} </li>
                <br>
                <li>Контроль исполнения приказа оставляю за собой.</li>
            </ol>
                
        {elseif $order_type == 'Допуск'}
            
            <p><strong><i>О допуске к промежуточной аттестации слушателей в {$orgName_short}</i></strong></p>
            <p align='justify'><font color="white">12345</font>В {$orgName_short} проводится промежуточная аттестация ({$certification_type}) по программе «{$program}» слушателей группы №{$group_no}. На основании вышеизложенного, <span style="letter-spacing: 5px;">приказываю</span>:
            <br>
            <ol>
                <li>Допустить до промежуточной аттестации учебную группу №{$group_no} слушателей с {$start_date} (приложение №1)</li>
                <br>
                <li>Куратор учебной группы №{$group_no} {$curator_lastname} {$curator_firstname}</li>
                <br>
                <li>Контроль исполнения приказа оставляю за собой.</li>
            </ol>
        {else}
            
            <p><strong><i>Об окончании обучения в {$orgName_short}</i></strong></p>
            <p align='justify'><font color="white">12345</font>В {$orgName_short} состоялась итоговая аттестация ({$certification_type}) по окончанию обучения, по программе «{$program}». На основании вышеизложенного, <span style="letter-spacing: 5px;">приказываю</span>:
                
            <ol>
                <li>Считать окончившимися с {$end_date} учебную группу №{$group_no}</li>
            </ol>
            
            <table border="1" valign="center" align="center" width="85%">
                <tr>
                    <td width="10%"><strong>№<br>п/п</strong></td>
                    <td width="45%" valign="center"><strong>ФИО слушателя</strong></td>
                    <td width="45%" valign="center"><strong>Подразделение</strong></td>
                </tr>

                {foreach from=$items item=item name=itemsloop}
                    {assign var="contact_firstname" value=$item->get('firstname')}
                    {assign var="contact_lastname" value=$item->get('lastname')}
                    {assign var="account_id" value=$item->get('account_id')}
                    <tr>
                        <td width="10%" align="right" style="padding-right: 1rem;">
                            {$smarty.foreach.itemsloop.index+1}
                        </td>
                        <td width="45%" align="left" style="padding-left: 1rem;">
                            {$contact_firstname} {$contact_lastname}
                        </td>
                        <td width="45%" align="left" style="padding-right: 1rem;">
                            {if $account_id}
                                {assign var="account_instance" value=Accounts_Record_Model::getInstanceById($account_id)}
                                {assign var="account_name" value=$account_instance->get('accountname')}
                                {$account_name}
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </table>
        {/if}
    
    {else}
        
        {if $sended_down}
            {assign var="sd_firstname" value=$sended_down->get('firstname')}
            {assign var="sd_lastname" value=$sended_down->get('lastname')}
        {/if}
        
        <p align='justify'><font color="white">12345</font>В соответствии с требованиями Федерального закона от 29.12.2012 №273-ФЗ «Об образовании в Российской Федерации», Положения об организации учебного процесса в {$orgName_short} от 31.01.2019 года</p>
        
        <h1>ПРИКАЗЫВАЮ:</h1>
        
        <br>
        <ol>
            <li>{if $sended_down}{$sd_lastname} {$sd_firstname}{else}__________{/if} отчислить из учебного центра в связи с нарушением условий договора.</li>
            <br>
            <li>Слушателей, не прошедших итоговую аттестацию отчислить c {$end_date}</li>
            <br>
            <li>Контроль исполнения приказа оставляю за собой.</li>
        </ol>
    {/if}

    <table width="100%">
        <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
          <tr>
            <td align="left">
              Директор
            </td>
            <td align="right">
              {$orgDirector}
            </td>
          </tr>
        </tbody>
    </table>
      
{if $order_type != 'Отчисление'}
    <tcpdf method="AddPage" />

    <table>
        <tbody>
            <tr>
                <td align="right">Приложение №1<br>к приказу №{$order_no}<br>от {$order_date}</td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>
        </tbody>
    </table>

    <table border="1" valign="center" align="center" width="85%">
        <tr>
            <td width="10%"><strong>№<br>п/п</strong></td>
            <td width="90%" valign="center"><strong>ФИО слушателя</strong></td>
        </tr>

        {foreach from=$items item=item name=itemsloop}
            {assign var="contact_firstname" value=$item->get('firstname')}
            {assign var="contact_lastname" value=$item->get('lastname')}
            {assign var="account_id" value=$item->get('account_id')}
            <tr>
                <td width="10%" align="right" style="padding-right: 1rem;">
                    {$smarty.foreach.itemsloop.index+1}
                </td>
                <td width="90%" align="left" style="padding-left: 1rem;">
                    {$contact_firstname} {$contact_lastname}
                </td>
            </tr>
        {/foreach}
    </table>
{/if}