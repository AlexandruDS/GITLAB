<div style="margin-bottom: 10px; margin-top: -50px;">
    <ul class="nav nav-pills nav-justified">
        <li role="presentation" class="{{Request::is('contul-meu') ? 'active' : ''}}"><a href="contul-meu">Contul meu</a></li>
        <li role="presentation" class="{{Request::is('admin/users') ? 'active' : ''}}"><a href="admin/users">Useri</a></li>
        <li role="presentation" class="{{Request::is('admin/texts') ? 'active' : ''}}"><a href="admin/texts">Texte</a></li>
        <li role="presentation" class="{{Request::is('admin/articles') ? 'active' : ''}}"><a href="admin/articles">Articole</a></li>
        <li role="presentation" class="{{Request::is('admin/services') ? 'active' : ''}}"><a href="admin/services">Servicii</a></li>
        <li role="presentation" class="{{Request::is('admin/pages') ? 'active' : ''}}"><a href="admin/pages">Pagini</a></li>
    </ul>
</div>
<hr>
