<?php
/**
 * Mở kết nối đến CSDL sử dụng MySQLi
 */
function mysqli_get_connection(){
    $dburl = "localhost";
    $username = 'root';
    $password = '';
    $dbname = 'shopbanquanao';
    $charset = 'utf8';

    $conn = mysqli_connect($dburl, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, $charset);

    return $conn;
}

/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws mysqli_sql_exception lỗi thực thi câu lệnh
 */
function my_mysqli_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    $conn = mysqli_get_connection();

    try {
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            throw new mysqli_sql_exception(mysqli_error($conn));
        }

        $types = '';
        foreach ($sql_args as $arg) {
            if (is_int($arg)) {
                $types .= 'i';
            } elseif (is_double($arg)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        if (!empty($types)) {
            mysqli_stmt_bind_param($stmt, $types, ...$sql_args);
        }

        mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $e) {
        throw $e;
    } finally {
        mysqli_close($conn);
    }
}

function my_mysqli_execute_return_lastInsertId($sql){
    $sql_args = array_slice(func_get_args(), 1);
    $conn = mysqli_get_connection();

    try {
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            throw new mysqli_sql_exception(mysqli_error($conn));
        }

        $types = '';
        foreach ($sql_args as $arg) {
            if (is_int($arg)) {
                $types .= 'i';
            } elseif (is_double($arg)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        if (!empty($types)) {
            mysqli_stmt_bind_param($stmt, $types, ...$sql_args);
        }

        mysqli_stmt_execute($stmt);

        // Trả về ID của bản ghi vừa insert
        $lastInsertedId = mysqli_insert_id($conn);

        return $lastInsertedId;
    } catch (mysqli_sql_exception $e) {
        throw $e;
    } finally {
        mysqli_close($conn);
    }
}


/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws mysqli_sql_exception lỗi thực thi câu lệnh
 */
function my_mysqli_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    $conn = mysqli_get_connection();

    try {
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            throw new mysqli_sql_exception(mysqli_error($conn));
        }

        $types = '';
        foreach ($sql_args as $arg) {
            if (is_int($arg)) {
                $types .= 'i';
            } elseif (is_double($arg)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        if (!empty($types)) {
            mysqli_stmt_bind_param($stmt, $types, ...$sql_args);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    } catch (mysqli_sql_exception $e) {
        throw $e;
    } finally {
        mysqli_close($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws mysqli_sql_exception lỗi thực thi câu lệnh
 */
function mysqli_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    $conn = mysqli_get_connection();

    try {
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            throw new mysqli_sql_exception(mysqli_error($conn));
        }

        $types = '';
        foreach ($sql_args as $arg) {
            if (is_int($arg)) {
                $types .= 'i';
            } elseif (is_double($arg)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        if (!empty($types)) {
            mysqli_stmt_bind_param($stmt, $types, ...$sql_args);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        return $row;
    } catch (mysqli_sql_exception $e) {
        throw $e;
    } finally {
        mysqli_close($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws mysqli_sql_exception lỗi thực thi câu lệnh
 */
function mysqli_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    $conn = mysqli_get_connection();

    try {
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            throw new mysqli_sql_exception(mysqli_error($conn));
        }

        $types = '';
        foreach ($sql_args as $arg) {
            if (is_int($arg)) {
                $types .= 'i';
            } elseif (is_double($arg)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        if (!empty($types)) {
            mysqli_stmt_bind_param($stmt, $types, ...$sql_args);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        return $row ? reset($row) : null;
    } catch (mysqli_sql_exception $e) {
        throw $e;
    } finally {
        mysqli_close($conn);
    }
}
?>
