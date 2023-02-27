<td>
    <div align="center">
        <?php
        $bida = $this->db->query("SELECT
                                SUM(`kum_usulan_baru`) AS kum_usulan_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` IN ('1','2')")->row();
        echo "$bida->kum_usulan_baru";
        ?>
    </div>
</td>
<td>
    <div align="center">
        <?php
        $bidb = $this->db->query("SELECT
                                SUM(`kum_usulan_baru`) AS kum_usulan_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` ='3'")->row();
        echo "$bidb->kum_usulan_baru";
        ?>
    </div>
</td>
<td>
    <div align="center">
        <?php
        $bidc = $this->db->query("SELECT
                                SUM(`kum_usulan_baru`) AS kum_usulan_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` ='4'")->row();
        echo "$bidc->kum_usulan_baru";
        ?>
    </div>
</td>
<td>
    <div align="center">
        <?php
        $bidd = $this->db->query("SELECT
                                SUM(`kum_usulan_baru`) AS kum_usulan_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` ='5'")->row();
        echo "$bidd->kum_usulan_baru";
        ?>
    </div>
</td>