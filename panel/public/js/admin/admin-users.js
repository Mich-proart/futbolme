jQuery(document).on('change', '#permisAdministrador, #permisGestorNoticias', function(e) {
    changeRoleField();
});

function changeRoleField() {
    var roles = new Array();

    if (jQuery('#permisAdministrador').is(':checked')) {
        roles.push('ROLE_ADMIN');
    }

    if (jQuery('#permisGestorNoticias').is(':checked')) {
        roles.push('ROLE_USER');
    }

    if (jQuery('#user_roles').size() == 1) {
        jQuery('#user_roles').val(roles);
    } else {
        jQuery('#user_edit_roles').val(roles);
    }
}