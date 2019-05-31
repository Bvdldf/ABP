{*{assign var="order_no" value=$order->get('order_no')}
{assign var="order_date" value=$order->get('order_date')}
{assign var="program" value=$order->get('program')}
{assign var="start_date" value=$order->get('start_date')}
{assign var="end_date" value=$order->get('end_date')}
{assign var="chairman_firstname" value=$chairman->get('first_name')}
{assign var="chairman_lastname" value=$chairman->get('last_name')}
{assign var="chairman_title" value=$chairman->get('title')}*}


<table align="center" widht="100%">
  <tbody>
    <tr>
      <td width="20%">
      </td>
      <td width="60%" align="center">
        {$orgName}
      </td>
      <td width="20%">
      </td>
    </tr>
</table>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
<table>
    <tr>
      <td></td>
      <td></td>
      <td></td>
    </tr>
        <tr>
      <td width="20%">
      </td>
      <td width="60%" align="center">
        <h1>ЖУРНАЛ</h1>
        <h3>контроля учебных занятий</h3>
      </td>
      <td width="20%">
      </td>
    </tr>
</table>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
<table>
    <tr>
      <td></td>
      <td></td>
    </tr>
        <tr>
      <td width="65%" align="center">
      </td>
      <td width="35%">
          <p>Начат&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;________________</p>
          <p>Окончен&nbsp;________________</p>
      </td>
    </tr>
  </tbody>
</table>
      
<tcpdf method="AddPage" />

<h1>ОБЩИЙ СПИСОК СЛУШАТЕЛЕЙ № 01</h1>

<table border="1" align="center" width="100%">
    <thead>
        <tr>
            <th width="10%">№ п/п</th>
            <th width="30%">Ф.И.О.</th>
            <th width="30%">Организация</th>
            <th width="30%">Должность</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$items item=item name=itemsloop}
            {assign var="item_firstname" value=$item->get('firstname')}
            {assign var="item_lastname" value=$item->get('lastname')}
            {assign var="item_title" value=$item->get('title')}
            {assign var="account_id" value=$item->get('account_id')}
            
            <tr>
                <td width="10%">{$smarty.foreach.itemsloop.index+1}</td>
                <td width="30%">{$item_lastname} {$item_firstname}</td>
                <td width="30%">
                    {if $account_id}
                        {assign var="account_instance" value=Accounts_Record_Model::getInstanceById($account_id)}
                        {assign var="account_name" value=$account_instance->get('accountname')}
                        {$account_name}
                    {/if}
                </td>
                <td width="30%">{$item_title}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
    
<tcpdf method="AddPage" />

<p>ДИСЦИПЛИНА<br>{$subject}</p>

<p>Оценка знаний и посещаемость</p>

<table border="1" align="center" width="100%">
    <tbody>
        
        <tr>
            <td width="10%" rowspan="2">№ п/п</td>
            <td width="30%">Дата</td>
            {foreach from=$lessons item=lesson name=itemsloop}
            {assign var="lesson_date" value=$lesson->get('lesson_date')}
            {assign var="sdate" value=explode("-", $lesson_date)}
            
            <td width="5%" rowspan="2">{$sdate[1]}<br>{$sdate[2]}</td>
            {/foreach}
        </tr>
        <tr>
            <td width="30%">Ф.И.О.</td>
            
        </tr>
        
        {foreach from=$items item=item name=itemsloop}
            {assign var="item_firstname" value=$item->get('firstname')}
            {assign var="item_lastname" value=$item->get('lastname')}
            {assign var="student_id" value=$item->getId()}
            
            <tr>
                <td width="10%">{$smarty.foreach.itemsloop.index+1}</td>
                <td width="30%">{$item_lastname} {$item_firstname}</td>
                {foreach from=$lessons item=lesson name=lessonsloop}
                    
                    <td width="5%">{if in_array($student_id, $lesson->getAbsent())}н{/if}</td>
                    
                {/foreach}
            </tr>
            
            {/foreach}
    </tbody>
</table>
    
{assign var="teacher_firstname" value=$teacher->get('first_name')}
{assign var="teacher_lastname" value=$teacher->get('last_name')}
    
<p>ПРЕПОДАВАТЕЛЬ {$teacher_lastname} {$teacher_firstname}</p>

<tcpdf method="AddPage" />

<table border="1" align="center" width="100%">
    <thead>
        <tr>
            <th align="center" width="15%">Дата проведения занятий</th>
            <th align="center" width="10%">Кол-во часов, вид занятий</th>
            <th align="center" width="55%">Номер, наименование темы</th>
            <th align="center" width="20%">Фамилия и подпись преподавателя</th>
        </tr>
    </thead>
    <tbody>
        {assign var="total_hours" value=0}
        {foreach from=$lessons item=lesson name=itemsloop}
            {assign var="lesson_date" value=$lesson->get('lesson_date')}
            {assign var="lesson_hours" value=$lesson->get('lesson_hours')}
            {assign var="lesson_type" value=$lesson->get('lesson_type')}
            {assign var="lesson_topic" value=$lesson->get('lesson_topic')}
            <tr>
                <td align="center" width="15%">{$lesson_date}</td>
                <td align="center" width="10%">{$lesson_hours}<br>{$lesson_type}</td>
                <td align="justify" width="55%">{$lesson_topic}</td>
                <td align="justify" width="20%"></td>
            </tr>
            {assign var="total_hours" value=$total_hours+$lesson_hours}
        {/foreach}
    </tbody>
</table>
    
    <br>
    <br>
    <br>
    
    <table width="100%">
        <tr>
            <td width="10%"></td>
            <td width="90%" align="left">Количество часов по программе: {$total_hours}</td>
        </tr>
        <tr>
            <td width="10%"></td>
            <td width="90%" align="left">Фактически проведено ________________________________</td>
        </tr>
    </table>
        
<tcpdf method="AddPage" />




<table width="100%" align="center">
    <tr>
        <td><h1>СВОДНАЯ ВЕДОМОСТЬ</h1></td>
    </tr>
    <tr>
        <td><h2>Результаты зачёта слушателей групп № НОМЕР ГРУППЫБ</h2></td>
    </tr>
</table>
<br><br>
<table border="1" align="center" width="100%">
    <thead>
        <tr>
            <th width="10%">№ п/п</th>
            <th width="55%">Ф.И.О.</th>
            <th width="15%">Номера билетов</th>
            <th width="20%">Оценка успеваемости</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$items item=item name=itemsloop}
            {assign var="item_firstname" value=$item->get('firstname')}
            {assign var="item_lastname" value=$item->get('lastname')}
            {assign var="item_title" value=$item->get('title')}
            {assign var="account_id" value=$item->get('account_id')}
            
            
                <tr>
                    <td width="10%">{$smarty.foreach.itemsloop.index+1}</td>
                    <td width="55%" align="left">{$item_lastname} {$item_firstname}</td>
                {foreach from=$exams item=exam name=examsloop}
                    {if $exam->get('contact_id') == $item->getId()}
                        {assign var="ticket_no" value=$exam->get('ticket_no')}
                        {assign var="grade" value=$exam->get('grade')}
                        <td width="15%">{$ticket_no}</td>
                        <td width="20%">{$grade}</td>
                    {else}
                        <td width="15%"></td>
                        <td width="20%"></td>
                    {/if}
                {/foreach}
                </tr>
            
        {/foreach}
    </tbody>
</table>
    
    <br><br>
    
    <p>Зачтено _________________________________________</p>
    <p>Не зачтено ______________________________________</p>
    
    <p><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br></p>
    
    <table width="100%">
        <tr>
            <td align="left">Преподаватель-методист</td>
            <td align="right"></td>
        </tr>
        <tr>
            <td align="left">{$orgName_short}</td>
            <td align="right">В.В.&nbsp;Чупрунова</td>
        </tr>
    </table>
