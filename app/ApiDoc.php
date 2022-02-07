<?php
/**
 * @OA\Info(
 *   title="WeDigital Garden - Core API",
 *   version="0.0.1",
 *   description="Documentation of Core API for We Digital Garden"
 * )
 *
 * @OA\Server(
 *     url=API_HOST
 * )
 *
 * @OA\Schema(
 *      schema="resource_id",
 *      minimum=1,
 *      description="The unique identifier of a resource",
 *      example="1"
 * )
 *
 * @OA\Schema(
 *      schema="token_resource",
 *      type="object",
 *      required={"access_token", "token_type", "expires_at"},
 *      @OA\Property(property="access_token", type="string", description="The token", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY0MTlmOWNhZWVhNDBhNDZmMGY2MzZhNzk4Y2M4M2ViZDIwMjFkNThlMjBjMzljOThhNDNjOGU3YzY4ZTAyMjQ2ZDk4OWVlMzY3ZjFkMjc5In0.eyJhdWQiOiIxIiwianRpIjoiNjQxOWY5Y2FlZWE0MGE0NmYwZjYzNmE3OThjYzgzZWJkMjAyMWQ1OGUyMGMzOWM5OGE0M2M4ZTdjNjhlMDIyNDZkOTg5ZWUzNjdmMWQyNzkiLCJpYXQiOjE1NTExNzc5MzEsIm5iZiI6MTU1MTE3NzkzMSwiZXhwIjoxNTgyNzEzOTMxLCJzdWIiOiIxNyIsInNjb3BlcyI6W119.h9IuKo7y4NliCSRN-C_Bq03c0u8FdyJ9z2XYJ1EmqbPCHGxSiKU9VYoala2A25QHDgkmmLa6UuW83HI97j5vxGyn_etX1V7DbBl2k4j3aAMHhLRJN56SI6c2_tfX0ohupyKvxyAjCWtkLwFgPGkayiL3opdQcLmqisQJJUq-7o8MV37c1RW4jnLFxGdc1DnCGt7R4rR0itWNSQOBFxmCyV5xfxC7d0zvtSI9SSgmpP6WFSXuclQsu3vA7iC52GYo3HbN3aibh2JGsmEuDeaD7Gk28Qvjl0XCzCTsXMCHrlhsc5Ul_kiRWHIi75bR_M50SOdglyp2m1D9tePbdn7lQVsI2OVdIXZc73lQjJ--YXzQCE2hF5T4Cr7br5mf7sa9XB91Tp4IG7irH4zdDfS5YOdI9RjGbLv9aanRU_azlHIC4nSiB_Yisir5RMYJQ_nCdTtJ4OJddeuHqnifjIJj1jkl7WhsRgspIqkFUuGGP_Aq347N-ybj-AV2KqQQXkXgb2Ll-jQL9p1Q3tsZuQu_SSiKs-7KhF5Yw_A6KUZopKE2nbVvUfKyHlKqVewz_VIbCXrE0UsMhw1CBSvhEZJTpPiaAfbvzzIflD1VLJZBmB9XiBZNhljmkQhRbQ_vSmcQDvAS6CGHB8BUUQsHay1RX-z5uU5LAuHjt59IMPgWSdA"),
 *      @OA\Property(property="token_type", type="string", description="The type of token", example="Bearer"),
 *      @OA\Property(property="expires_at", type="string", description="The expires date", example="2019-03-05 10:45:31"),
 * )
 *
 * @OA\Schema(
 *      schema="unauthorized_resource",
 *      type="object",
 *      required={"message"},
 *      @OA\Property(property="message", type="string", description="The message", example="Unauthorized")
 * )
 *
 * @OA\Schema(
 *      schema="message_resource",
 *      type="object",
 *      required={"message"},
 *      @OA\Property(property="message", type="string", description="The message", example="message response")
 * )
 *
 * * @OA\Schema(
 *      schema="date_resource",
 *      type="object",
 *      required={"date", "timezone_type", "timezone"},
 *      @OA\Property(property="date", type="date", description="the date", example="2019-01-17 11:00:00.000000"),
 *      @OA\Property(property="timezone_type", type="string", description="The timezone type", example="3"),
 *      @OA\Property(property="timezone", type="string", description="The timezone", example="UTC"),
 * )
 *
 *  @OA\SecurityScheme(
 *     type="http",
 *     name="bearerAuth",
 *     securityScheme="bearer",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 * )
 *
 */
