<mj-section background-color="[[+background_color]]"
            background-url="[[+background_image]]"
            background-size="cover"
            background-repeat="no-repeat">
    <mj-column width="70%">
        [[+col_1]]
    [[+col_2:notempty=`
    </mj-column>
    <mj-column width="30%">
    `]]
        [[+col_2]]
    [[+col_3:notempty=`
    </mj-column>
    <mj-column>
    `]]
        [[+col_3]]
    [[+col_4:notempty=`
    </mj-column>
    <mj-column>
    `]]
        [[+col_4]]
    </mj-column>
</mj-section>