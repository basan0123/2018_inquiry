<html>
{*  admin_list.tpl  *}
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body>

<div class="container">
<h1>–â‚¢‡‚í‚¹ˆê——</h1>
{* $data|var_dump *}

<table class="table table-hover">
<tr>
  <th>ID<a href="./admin_list.php?sort=id_d">¥</a>
        <a href="./admin_list.php?sort=id">£</a>
  <th>–¼‘O<a href="./admin_list.php?sort=name_d">¥</a>
          <a href="./admin_list.php?sort=name">£</a>
  <th>ì¬“ú<a href="./admin_list.php?sort=created_d">¥</a>
            <a href="./admin_list.php?sort=created">£</a>
  <th>•ÔM“ú<a href="./admin_list.php?sort=response_d">¥</a>
            <a href="./admin_list.php?sort=response">£</a>
{foreach from=$data item=i}
<tr>
  <td><a href="./admin_detail.php?id={$i.id}">{$i.id}</a>
  <td>{$i.name}
  <td>{$i.created_at}
  <td>{$i.response_at}
  <td><a href="./admin_detail.php?id={$i.id}">Ú×‰{——</a>
{/foreach}

</table>
</div>

</body>
</html>