<td>
    <div align="center">
        <?php
        $bida = $this->db->query("SELECT
                                SUM(`kum_penilai_baru`) AS kum_penilai_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` IN ('1','2')")->row();
        echo "$bida->kum_penilai_baru";
        ?>
    </div>
</td>
<td>
    <div align="center">
        <?php
        $bidb = $this->db->query("SELECT
                                SUM(`kum_penilai_baru`) AS kum_penilai_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` ='3'")->row();
        echo "$bidb->kum_penilai_baru";
        ?>
    </div>
</td>
<td>
    <div align="center">
        <?php
        $bidc = $this->db->query("SELECT
                                SUM(`kum_penilai_baru`) AS kum_penilai_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` ='4'")->row();

        $k4 = $data->pc * 0.01 * $kebutuhan;

        if ($bidc->kum_penilai_baru > $k4) {
            echo "$k4";
        } else {
            echo "$bidc->kum_penilai_baru";
        }
        ?>
    </div>
</td>
<td>
    <div align="center">
        <?php
        $bidd = $this->db->query("SELECT
                                SUM(`kum_penilai_baru`) AS kum_penilai_baru
                            FROM
                                dupaks AS a,
                                `usulan_dupaks` AS b
                            WHERE b.`dupak_no` = a.`no`
                                AND b.`usulan_no` = '$data->no'
                                AND a.`dupak_kategori_id` ='5'")->row();

        $k5 = $data->pd * 0.01 * $kebutuhan;

        if ($bidd->kum_penilai_baru > $k5) {
            echo "$k5";
        } else {
            echo "$bidd->kum_penilai_baru";
        }
        ?>
    </div>
</td>