<ul class="socials_list">
    <li><a href="{{!is_null($settings) && $settings->facebook ? $settings->facebook : ''}}" target="_blank" class="icon_facebook">facebook</a></li>
    <li><a href="{{!is_null($settings) && $settings->twitter ? $settings->twitter : '' }}" target="_blank" class="icon_twitter">twitter</a></li>
    <li><a href="{{!is_null($settings) && $settings->instagram ? $settings->instagram : '' }}" target="_blank" class="icon_instagram">instagram</a></li>
</ul>
