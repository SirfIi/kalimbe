class MenuBarWidget {
    public function namageMenu($value)
    {
        switch ($value) {
            case 'homepage':
                $html = '<ul>';
                $html = $html.'<li>Homepage 1</li>';
                $html = $html.'<li>Homepage 2</li>';
                $html = $html.'<li>Homepage 3</li>';
                $html = $html.'</ul>';
                break;
            case 'sidebar':
                $html = '<ul>';
                $html = $html.'<li>SideBar 1</li>';
                $html = $html.'<li>SideBar 2</li>';
                $html = $html.'<li>SideBar 3</li>';
                $html = $html.'</ul>';
                break;
            default:
                $html = '<ul>';
                $html = $html.'<li>Default 1</li>';
                $html = $html.'<li>Default 2</li>';
                $html = $html.'<li>Default 3</li>';
                $html = $html.'</ul>';
                break;
        }
        return $html;
    }
} 
Widget::register('menubar', 'MenuBarWidget@namageMenu');